function getInfo(id) {
    $.ajax({
        url: 'api/info.php',
        type: 'POST',
        async: false,
        data: {
            'id': id
        },
        dataType: 'JSON',
        success: function(response) {
            var infoData = response.infoData;
            $('#userName').html(infoData['name']);
            $('#email').html(infoData['email']);
            $('#Mobile_Number').html(infoData['Mobile_Number']);
            $('#DOB').html(infoData['DOB']);
            $('#Address').html(infoData['Address']);
            $('#City').html(infoData['City']);
            $('#State').html(infoData['State']);
            $('#Country').html(infoData['Country']);
            $('#otherUserInfoTable').hide();
            if (response.userInfoData.length > 0) {
                $('#otherUserInfoTable').show();
                var userInfoData = response.userInfoData;
                for (var i = 0; i < userInfoData.length; i++) {
                    var temp = "<tr>" +
                        "<td>" + userInfoData[i]['name'] + "</td>" +
                        "<td>" + userInfoData[i]['email'] + "</td>" +
                        "<td>" + userInfoData[i]['Mobile_Number'] + "</td>" +
                        "<td>" + userInfoData[i]['status'] + "</td>" +
                        "<td><i class='fas fa-pen'></i>&nbsp;<i class='fa fa-trash'></i>&nbsp;<i class='fa fa-eye'></i></td>" +
                        "</tr>";
                    $('#otherUserInfo').append(temp);
                }
                $('#otherUserInfoTableTable').DataTable();
            }
        },
        error: function(result) {
            //console.log(result);
            console.log('Failed to connect!!!!!!');

        }
    });
}