<?php
header("Content-Type:text/html;charset=utf-8");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>三级联动</title>
    <style>
    </style>
    <script src="../../jquery3.1.0.js"></script>
</head>
<body>

<select name="provinces" id="province">
    <option value="default">==请选择省==</option>
</select>

<select name="cities" id="city">
    <option value="default">==请选择市==</option>
</select>

<select name="areas" id="area">
    <option value="default">==请选择区==</option>
</select>

</body>
<script>
    $(function ()
    {
        $('#city').attr('disabled','disabled');
        $('#area').attr('disabled','disabled');
        var sql = 'select * from china_area where pid = 0';
        $.post('db.php' , {"pid":0} , function(data)
        {
            $.each(data, function(key, val)
            {
                $("#province").append("<option value=\""+val['id']+"\">"+val['name']+"</option>");
            });
        },'json');
    });

    $('#province').change(function ()
    {
        var pro_id = $('#province').val();
        if (pro_id != 'default')
        {
            $('#city').empty();
            $("#city").append("<option value=\"default\">==请选择市==</option>");
            $.post('db.php' , {"pid":pro_id} , function(data)
            {
                $.each(data, function(key, val)
                {
                    $("#city").append("<option value=\""+val['id']+"\">"+val['name']+"</option>");
                });
            },'json');
            $('#city').removeAttr('disabled','disabled');
        }
        else
        {
            $('#city').empty();
            $("#city").append("<option value=\"default\">==请选择市==</option>");
            $('#area').empty();
            $("#area").append("<option value=\"default\">==请选择区==</option>");
            $('#city').attr('disabled','disabled');
            $('#area').attr('disabled','disabled');
        }
    });

    $('#city').change(function ()
    {
        var pro_id = $('#city').val();
        if (pro_id != 'default')
        {
            $('#area').empty();
            $("#area").append("<option value=\"default\">==请选择区==</option>");
            $.post('db.php' , {"pid":pro_id} , function(data)
            {
                $.each(data, function(key, val)
                {
                    $("#area").append("<option value=\""+val['id']+"\">"+val['name']+"</option>");
                });
            },'json');
            $('#area').removeAttr('disabled','disabled');
        }
        else
        {
            $('#area').empty();
            $("#area").append("<option value=\"default\">==请选择区==</option>");
            $('#area').attr('disabled','disabled');
        }
    });

</script>
</html>
