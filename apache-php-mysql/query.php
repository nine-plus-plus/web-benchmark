
<?php 


require('config.php');
header('Content-Type: application/json');



  $sql = "SELECT * FROM customers c INNER JOIN  (SELECT sum(amount) as summary ,customerNumber,paymentDate FROM `payments` GROUP BY customerNumber) t
             on c.customerNumber = t.customerNumber";

  //$sql = "SELECT * FROM customers  ORDER BY `customers`.`customerNumber` ";
 $result = $conn->query($sql);
 $response = array();
$data = array();
if ($result->num_rows > 0) {
  $i=0;
    while($row = $result->fetch_assoc()) {
      
    $dataArray = array();

    // $dataArray[] = $row["customerNumber"];
    // $dataArray[] = $row["customerName"];
    // $dataArray[] = $row["phone"];
    // $dataArray[] = $row["addressLine1"];
    // $dataArray[] = $row["summary"];
    // $data[] = $$dataArray;

    $response[$i]['customerNumber']  = preg_replace('/[^a-z0-9\_\- ]/i', '', $row['customerNumber']);
    $response[$i]['customerName']=  preg_replace('/[^a-z0-9\_\- ]/i', '', $row['customerName']);
    $response[$i]['phone']= $row['phone'];
    $response[$i]['addressLine1']= preg_replace('/[^a-z0-9\_\- ]/i', '', $row['addressLine1']);
    $response[$i]['summary']= $row['summary'];
    $data['data'][$i] = $response[$i];
    $i=$i+1;

        // $dataArray[] = array(
        //   'customerNumber' => $row["customerNumber"],
        //   'customerName' => $row["customerName"],
        //   'phone' => $row["phone"],
        //   'addressLine1' => $row["addressLine1"],
        //   'summary' => $row['summary']
        // );
            //array_push($data, $dataArray);
       
    }
  
}

echo  json_encode($data);

// $sql = "SELECT * FROM customers limit 20";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//       $data[] = $row;
//     }
// } else {
//     echo "0 results";
// }
// //var_dump($data);

// header('Content-Type: application/json');
// echo json_encode($data , JSON_UNESCAPED_UNICODE);
?>