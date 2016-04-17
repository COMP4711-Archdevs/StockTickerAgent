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

     public function getAllStocksFromServer(){
      $allStockData = $this->readFromURL("http://bsx.jlparry.com/data/stocks");
       // $allStockData = $this->readFromURL("http://www.comp4711bsx.local/data/stocks");
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

    public function getAllMovementOfOneStock($stock){
        $stockMovements = $this->readFromURL("http://bsx.jlparry.com/data/Movement");
        //$stockMovements = $this->readFromURL("http://www.comp4711bsx.local/data/Movement");
       
        $stockMovementList = array();

         for($i = 1; $i < count($stockMovements); $i++){
             if($stockMovements[$i][2] == $stock){
                $stockInfo = array();
                
                $stockInfo["Datetime"] = $stockMovements[$i][1];
                $stockInfo["Code"] = $stockMovements[$i][2];
                $stockInfo["Action"] = $stockMovements[$i][3];
                $stockInfo["Amount"] = $stockMovements[$i][4];
                
                array_push($stockMovementList,$stockInfo);
            }
        } 

        return $stockMovementList;
   }

  public function getAllTransactionOfOneStock($stock){
        $stockMovements = $this->readFromURL("http://bsx.jlparry.com/data/transactions");
        //$stockMovements = $this->readFromURL("http://www.comp4711bsx.local/data/transactions");
       
        $stockMovementList = array();

         for($i = 1; $i < count($stockMovements); $i++){
             if($stockMovements[$i][2] == $stock){
                $stockInfo = array();
                
                $stockInfo["Datetime"] = $stockMovements[$i][1];
                $stockInfo["Agent"] = $stockMovements[$i][2];
                $stockInfo["Player"] = $stockMovements[$i][3];
                $stockInfo["Stock"] = $stockMovements[$i][4];
                $stockInfo["Trans"] = $stockMovements[$i][5];
                $stockInfo["Quantity"] = $stockMovements[$i][6];

                array_push($stockMovementList,$stockInfo);
            }
        } 
        $stockInfo = array();
                
                $stockInfo["Datetime"] = "dummy data";
                $stockInfo["Agent"] = "Clyde";
                $stockInfo["Player"] = "HHH";
                $stockInfo["Stock"] = "Cocaine";
                $stockInfo["Trans"] = "$$$";
                $stockInfo["Quantity"] = "100kg";

                array_push($stockMovementList,$stockInfo);
        return $stockMovementList;
   }

public function getRecentMovements(){
       $stockMovements = $this->readFromURL("http://bsx.jlparry.com/data/Movement");
       
       $stockMovementList = array();
       
         for($i = 1; $i < count($stockMovements); $i++){
                  if(count($stockMovementList) >= 5){
                break;
                }
            

                $stockInfo = array();
                
                $stockInfo["Datetime"] = $stockMovements[$i][1];
                $stockInfo["Code"] = $stockMovements[$i][2];
                $stockInfo["Action"] = $stockMovements[$i][3];
                $stockInfo["Amount"] = $stockMovements[$i][4];
                
                array_push($stockMovementList,$stockInfo);
            
        }  
       
       return $stockMovementList;
   }

   public function getRecentTransactions(){
       $stockMovements = $this->readFromURL("http://bsx.jlparry.com/data/transactions");
       
       $stockMovementList = array();
       
        for($i = 1; $i < count($stockMovements); $i++){
            if(count($stockMovementList) >= 5){
                break;
                }
            
            $stockInfo = array();
                $stockInfo["Datetime"] = $stockMovements[$i][1];
                $stockInfo["Agent"] = $stockMovements[$i][2];
                $stockInfo["Player"] = $stockMovements[$i][3];
                $stockInfo["Stock"] = $stockMovements[$i][4];
                $stockInfo["Trans"] = $stockMovements[$i][5];
                $stockInfo["Quantity"] = $stockMovements[$i][6];
            
            array_push($stockMovementList,$stockInfo);
       }
       
       return $stockMovementList;
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
