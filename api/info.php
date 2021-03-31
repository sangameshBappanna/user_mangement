<?php
    include 'connection.php';
    $respons = array();
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $q = $conn->prepare("SELECT * FROM users WHERE id = $id");
        $q->execute();
        $result = $q->setFetchMode(PDO::FETCH_ASSOC);
        $infoData = array();
        foreach($q->fetchAll() as $k=>$v) {
            $infoData['name'] = $v['name'];
            $infoData['email'] = $v['email'];
            $infoData['Mobile_Number'] = $v['Mobile_Number'];
            $infoData['DOB'] = $v['DOB'];
            $infoData['Address'] = $v['Address'];
            $infoData['City'] = $v['City'];
            $infoData['State'] = $v['State'];
            $infoData['Country'] = $v['Country'];
            $role_id = $v['role_id'];

        }
        $userInfoData = array();
        $statusClass = array(
            '1'=>'Active',
            '0'=>'De-Active'
        );
        if($role_id == 1){
            $q = $conn->prepare("SELECT * FROM users ");
            $q->execute();
            $result = $q->setFetchMode(PDO::FETCH_ASSOC);
            $userInfoData = array();
            foreach($q->fetchAll() as $k=>$v) {
                $temp = array();
                $temp['name'] = $v['name'];
                $temp['email'] = $v['email'];
                $temp['Mobile_Number'] = $v['Mobile_Number'];
                $temp['DOB'] = $v['DOB'];
                $temp['Address'] = $v['Address'];
                $temp['City'] = $v['City'];
                $temp['State'] = $v['State'];
                $temp['Country'] = $v['Country'];
                $temp['status'] = $statusClass[$v['is_valid']];
                array_push($userInfoData,$temp);
            }
        }

        $respons['userInfoData'] = $userInfoData;
        $respons['infoData'] = $infoData;
        $respons['message'] = "";
        echo json_encode($respons);
        die();   
    }
?>