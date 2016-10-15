<?php

namespace App\Repository;

use DB;
use App\Contracts\Top;
use Carbon\Carbon;

class Author implements Top
{
     public function top($period)
    {
        $subPeriod = '';
        $top = DB::table('transaction')
            ->join('bookauthors', 'bookauthors.book_id', '=', 'transaction.book_id')// аналогично команде on in SQL
            ->join('authors','authors.id', '=', 'bookauthors.author_id')
            ->select('authors.name', 'authors.id', 'transaction.created_at', DB::raw('count(authors.id) as count'));//выбираем книги, которые брали чаще всего
        
        //находим необходимый период для выборки с помощью Carbon
        switch($period){
            case 'week': $subPeriod = Carbon::now()->subWeek();
            break;
            
            case 'month': $subPeriod = Carbon::now()->subMonth();
            break;
            
            case 'year': $subPeriod = Carbon::now()->subYear();
            break;
        }
        
        if(!empty($period)){
            $top->whereRaw('transaction.created_at >= ?', [$subPeriod]);//выбираем все транзакции за период назад до текущего времени
        }
        
        $top->groupBy('authors.name')//группируем по названию
            ->orderBy('count', 'desc')//сортировка от новых к старым
            ->limit(10);//ограничиваем до 10 результатов выборки
        
        $list = $top->get();//формируем список
        return $list;//возвращаем список
    }
}

?>