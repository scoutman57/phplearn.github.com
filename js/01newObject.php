<?php
header("Content-Type:text/html;charset=utf-8");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>newObject</title>
    <script>
        //方法1   创建了对象的一个新实例，并向其添加了四个属性：
        person = new Object();
        person.fiestName = "Bill";
        person.lastName = "Gates";
        person.age=56;
        person.eyecolor="blue";
        document.write(person.fiestName + " is " + person.age + " years old.");

        document.write("<hr>");

        //方法2   替代语法（使用对象 literals）：
        person2 = {fiestName:"Bill2",lastName:"gates",age:56.5,eyecolor:"blue"};
        document.write(person2.fiestName + " is " + person2.age + " years old.");

        document.write("<hr>");

        //方法3   使用函数来构造对象：
        function personx(firstname,lastname,age,eyecolor)
        {
            this.firstname=firstname;
            this.lastname=lastname;
            this.age=age;
            this.eyecolor=eyecolor;
        }

        var sb = new personx("Billx","Gates",56.8,"blue");
        var sb2=new personx("Steve","Jobs",48,"green");
        document.write(sb.firstname + " is " + sb.age + " years old.");
        document.write('<br>');
        document.write(sb2.firstname + " is " + sb2.age + " years old.");


        person.fiestName = "Bill";
        var x = person.fiestName;
        document.write('<br>' + x);
    </script>
</head>
<body>

</body>
</html>













