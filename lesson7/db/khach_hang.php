<?php
require_once './../../db/ket_noi.php';
function getAll(){
    $conn = getConnection();
    
    $sql = "SELECT * FROM khach_hang";

    $statement = $conn->prepare($sql);
    $statement->execute([]);

    $result = [];
    while (true) {
        $rowData =  $statement->fetch();
        if($rowData == false){
            break;
        }
        $row = [
            'id' => $rowData['id'],
            'ma' => $rowData['ma'],
            'ten' => $rowData['ten'],
            'sdt' => $rowData['sdt'],
            'gioi_tinh' => '',
            'dia_chi' => $rowData['dia_chi'],
            'email' => $rowData['email'],
            'avatar' => $rowData['avatar']
        ];
        if($rowData['gioi_tinh'] == 1){
            $row['gioi_tinh'] =  'Nam';
        } else if ($rowData['gioi_tinh'] == 2){
            $row['gioi_tinh'] =  'Nữ';
        }

        array_push($result, $row);
    }
    return $result;
}

function insert(array $data) {
    $conn = getConnection();

    $sql = "INSERT INTO khach_hang(ma, ten, sdt, email, dia_chi, gioi_tinh, avatar) " . 
        "VALUE (:ma, :ten, :sdt, :email, :dia_chi, :gioi_tinh, :avatar)";  

    $statement = $conn->prepare($sql);
    $statement->execute($data);
}

function findByID(int $id) {
    $conn = getConnection();
    $sql = "SELECT * FROM khach_hang WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute([ 'id' => $id ]);

    $rowData =  $statement->fetch();

    $row = [
        'id' => $rowData['id'],
        'ma' => $rowData['ma'],
        'ten' => $rowData['ten'],
        'sdt' => $rowData['sdt'],
        'gioi_tinh' => '',
        'dia_chi' => $rowData['dia_chi'],
        'email' => $rowData['email'],
        'avatar' => $rowData['avatar']
    ];
    if($rowData['gioi_tinh'] == 1){
        $row['gioi_tinh'] =  'Nam';
    } else if ($rowData['gioi_tinh'] == 2){
        $row['gioi_tinh'] =  'Nữ';
    }
    return $row;
}

function update(array $data) {
    $conn = getConnection();
    $sql = "UPDATE khach_hang SET ma = :ma, ten = :ten, email = :email, sdt = :sdt, dia_chi = :dia_chi, gioi_tinh = :gioi_tinh, avatar = :avatar WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}

function deleteById(int $id) {
    $conn = getConnection();
    $sql = "DELETE FROM khach_hang WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute([ 'id' => $id]);
}
?>