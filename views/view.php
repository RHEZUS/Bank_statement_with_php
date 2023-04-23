<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        h1{
            margin: 50px auto;
            text-align: center;
        }
        table{
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
            margin: 50px auto;
        }
        table tr th, table tr td{
            padding: 5px;
            border: 1px solid  #eee;
        }
        .text-green{
            color:green;
        }
        .text-red{
            color:red;
        }
        table tfoot tr th{
            font-size: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>Table of expenses</h1>
    <table >
        <thead>
            <tr>
                <th>DATE</th>
                <th>CHECK #</th>
                <th>DESCRIPTION</th>
                <th>AMOUNT</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($transactions)):?>
            <?php foreach($transactions as $key => $item):?>
            
            <tr>
                <td><?php echo $item['date']; ?></td>
                <td><?php echo $item['check']; ?></td>
                <td><?php echo $item['description']; ?></td>
                <td class="<?php echo textColor($item['amount']); ?>"><?php  echo $item['amount']; ?></td>
            </tr>
            
            <?php endforeach ?>
            <?php endif ?>
        </tbody>

        <tfoot>
            <?php if(!empty($result)):?>
        
            <tr>
                <th colspan="3">Total Income</th>
                <td><?php echo addDollar($result['totalIncomes']); ?></td>
            </tr>
            <tr>
                <th colspan="3">Total Expenses</th>
                <td><?php echo addDollar($result['totalExpenses']); ?></td>
            </tr>
            <tr>
                <th colspan="3">Net Total</th>
                <td><?php echo addDollar($result['total']); ?></td>
            </tr>

            <?php endif ?>
        </tfoot>
        
        

        
    </table>
</body>
</html>