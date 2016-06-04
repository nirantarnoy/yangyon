<?php
// if(!$_GET['reportid'])
// {
//	return;
// }


    define('JAVA_INC_URL','http://localhost:8080/JavaBridge/java/Java.inc');
    require_once(JAVA_INC_URL);
  //require_once("http://127.0.0.1:85/JavaBridge/java/Java.inc");

$system = new Java('java.lang.System');
$class = new JavaClass("java.lang.Class");
$class->forName("com.microsoft.sqlserver.jdbc.SQLServerDriver");
//$class->forName("com.mysql.jdbc.Driver");
$driverManager = new JavaClass("java.sql.DriverManager");
//$conn = $driverManager->getConnection("jdbc:mysql://localhost/stdb?user=sa&password=Tamakogi2012");
$conn = $driverManager->getConnection("jdbc:sqlserver://localhost;databaseName=st_data;user=sa;password=Tamakogi2012");

//compliler

$compileManager = new JavaClass("net.sf.jasperreports.engine.JasperCompileManager");
$viewer = new JavaClass("net.sf.jasperreports.view.JasperViewer");

$fillManager = new JavaClass("net.sf.jasperreports.engine.JasperFillManager");
$params =  new Java("java.util.HashMap");

	if($_GET['reportid']==1)
	{
	 	$reportname = "invamout_month_bysale.jrxml";
		$report = $compileManager->compileReport("C:/inetpub/niran/streport/".$reportname);
		$params->put("ForYear",(int)$_GET['params']);
	    $params->put("ForMonth",(int)$_GET['params2']);
		//$params->put("date", convertValue("2007-12-31 0:0:0", "java.sql.Timestamp"));
	 }
	 






$emptyDatasource = new JavaClass("net.sf.jasperreports.engine.JREmptyDataSource");
$jasperPrint = $fillManager->fillReport($report,$params,$conn);

$exportManager = new JavaClass("net.sf.jasperreports.engine.JasperExportManager");
$outputPath = realpath(".")."/"."output2.pdf";

//$exportManager->exportReportToHtml($jasperPrint,$outputPath);
//header("Content-type: application/html");

$exportManager->exportReportToPdfFile($jasperPrint,$outputPath);
header("Content-type: application/pdf");

readfile($outputPath);
unlink($outputPath);
?>