<?php
	header("Content-Type:text/html;charset=utf-8");
	//模拟制作网购(例如淘宝)-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	$array = array('北京市' => 
		array('石景山区' , '朝阳区' , '海淀区'), 
		'四川省' => 
		array('成都市' =>
			array('龙泉驿区','高新区','武侯区'),
			'自贡市' => 
			array('自流井','沿滩'),),
		'河北省' =>
		array('衡水市' => 
			array('路北新区','桃城区','冰湖新区'),),);

	

	function checkName($name)//
	{
		return strlen($name) != 0;
	}

	function checkAddressIsNull($qu , $shi)//
	{
		return strlen($qu) != 0 && strlen($shi) != 0;
	}

	function checkShenShiQu($qu , $shi , $shen)
	{
		$array = addArray();
		if ($shi == '北京市')
		{
			if ( in_array($qu , $array[$shi]))
				return true;
			else
				return false;
		}
		else
		{
			if (array_key_exists($shen, $array) && array_key_exists($shi, $array[$shen]) && in_array($qu, $array[$shen][$shi]))
				return true;
		}
		return false;
	}

	function checkPhoneNumberx($phone)//
	{
		return strlen($phone) == 11 && is_numeric($phone);		
	}

	function checkYouBian($youBian)//
	{
		if (strlen($youBian) == 0)
			return true;
		elseif (strlen($youBian) != 6)
			return false;
		elseif (strlen($youBian) == 6 && is_numeric($youBian))
			return true;	
	}

	function randNumber()
	{
		return $number = rand(10000000,99999999);
	}

	function regieterTao($name , $phone , $qu , $shi , $youBian = '' , $shen = '')
	{
		$array = addArray();
		if (!checkName($name))
			return '用户名不能为空<br>';
		if (!checkAddressIsNull($qu , $shi))
			return '地址不能为空<br>';
		if (!checkPhoneNumberx($phone))
			return '手机号码必须为11位数字<br>';
		if (!checkYouBian($youBian))
			return '邮编必须是6位数字或者不填<br>';
		if (!checkShenShiQu($qu , $shi , $shen))
			return '地址有误';
		echo $name . '订单提交成功!<br>订单号为:'.randNumber().'<br>地址为:'.$shen.$shi.$qu.'<br>收件人为:'.$name.'<br>手机号为:'.$phone.'<br>邮编:'.$youBian;
	}

	echo regieterTao('myName' , '12345678901' , '朝阳区' , '北京市' , '610500' );




	echo '<hr>';
	function addArray()
	{
		return $array = array('北京市' => 
		array('石景山区' , '朝阳区' , '海淀区'), 
		'四川省' => 
		array('成都市' =>
			array('龙泉驿区','高新区','武侯区'),
			'自贡市' => 
			array('自流井','沿滩'),),
		'河北省' =>
		array('衡水市' => 
			array('路北新区','桃城区','冰湖新区'),),);
	}

?>