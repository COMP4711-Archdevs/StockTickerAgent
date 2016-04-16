<?php

/**
 * Description of Stock
 *
 * @author a00906732
 */
class Stock extends MY_Model {
    // constructor
    function __construct() {
        parent::__construct('stocks','code');
    }

     function getAllStocksFromServer(){
       $allStockData = $this->readFromURL("http://bsx.jlparry.com/data/stocks");
        
       $allStock = array();

       for($i = 1; $i < count($allStockData); $i++){
            $stockInfo = array();
            
            $stockInfo["Code"] = $allStockData[$i][0];
            $stockInfo["Name"] = $allStockData[$i][1];
            $stockInfo["Value"] = $allStockData[$i][3];
            
            array_push($allStock,$stockInfo);
        } 
        
        return $allStock; 
    }






     public function readFromURL($url)
    {
        $content = array();
       // $row = 1;

        if (($handle = fopen($url, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
               
            //    $row++;
                $temp = array();
                for ($i=0; $i < $num; $i++) {
                    $temp[] = $data[$i];
                }
                $content[] = $temp;
            }
            fclose($handle);
        }
        return $content;
    }
}
