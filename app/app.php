<?php

declare(strict_types = 1);

// Scan all files in a given directory
function get_scanFile(string $filePath):array{

    $files = [];

    foreach (scandir($filePath) as $file) {

        // check if the item is not a directory

        if (is_dir($file)) {

            continue;

        }

        $files[] = $filePath . $file;
    }

    // browse the list of files and collect the transactions

    foreach ($files as $filename) {

        $data = ['date'=>'','check'=>'','description'=>'','amount'=>''];

        $transactions=[];

        $file = fopen($filename, 'r');

        fgetcsv($file);

        while(($transaction = fgetcsv($file)) !== false){

            $data['date'] =$transaction[0];
            $data['check'] =$transaction[1];
            $data['description'] =$transaction[2];
            $data['amount'] =$transaction[3];

            $transactions[]=$data;
        }

    }

    return $transactions;
}


// calculate the incomes, the expenses and the net total.
function calculate(array $transactionList):array{


    $results = ['total' =>0 , 'totalIncomes' =>0, 'totalExpenses'=>0];

    foreach ($transactionList as $key => $value) {

        // remove the $ sign on the numbers and cast the number to float

        $amount =(float) str_replace(['$'],'',$value['amount']);

        

        $results['total'] += $amount;

        if ($amount >= 0) {
            $results['totalIncomes'] += $amount;
        }elseif($amount < 0){
            $results['totalExpenses'] += $amount;
        }
    }

    return $results;
}