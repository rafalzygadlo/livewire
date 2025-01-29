<?php

/**
 * ColumnText
 * 
 * @category   Libs
 * @package    CMS
 * @author     Rafał Żygadło <rafal@maxkod.pl>
 
 * @copyright  2016 maxkod.pl
 * @version    1.0
 */

namespace Lib\Column;

use Lib\Column;

class ColumnPriceMarginConst extends Column
{
    
    public function Render($view, $item)
    {
        //print_r($item);
        $price_ok = $item->products_price_tax_2;
        
        $net = $item->products_purchase_price + ($item->products_purchase_price * PRICE_MARGIN_2/100);
        $price = $net + ($net * ($item->tax_rate/100));
        $price = number_format($price, 2 );
        
        if($price_ok != $price)
        {
    
            print '<span class="label label-danger">'.$price_ok.'</span>';
            print '<br>';
            print '<br>';
            print '<span class="label label-success">'.$price.'</span>';
        }
        else
        {
            print $price_ok;
        }
        
    }

}

