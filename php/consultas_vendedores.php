<?php
//Sección de valores parte superior index   --------------------------------------------------------------------------------------------
	//Consulta de facturas de Clientes
	$Consulta_Monto_Factura ="SELECT sum(T1.[TotalSumSy]) as Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] >= '".$_SESSION["Fecha_Inicial"]."' AND  T0.[DocDate] <= '".$_SESSION["Fecha_Final"]."' AND  T1.[TargetType] <> 14";
	$Resultado_Consulta = odbc_exec($Conexion_SQL, $Consulta_Monto_Factura);
	$Monto_Total = odbc_result($Resultado_Consulta, "Total");
	$facturas = "$". number_format($Monto_Total, 2);
	odbc_close($Conexion_SQL);

	//Consulta de facturas de Clientes 2015
	$Consulta_Monto_Factura_F15 ="SELECT sum(T1.[TotalSumSy]) as Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] >= '2015-01-01' AND  T0.[DocDate] <= '2015-12-31' AND  T1.[TargetType] <> 14";
	$Resultado_Consulta_F15 = odbc_exec($Conexion_SQL, $Consulta_Monto_Factura_F15);
	$Monto_Total_F15 = odbc_result($Resultado_Consulta_F15, "Total");
	$facturas2 = "$". number_format($Monto_Total_F15, 2);
	odbc_close($Conexion_SQL);

	//Consulta de facturas de Clientes 2014
	$Consulta_Monto_Factura_F14 ="SELECT sum(T1.[TotalSumSy]) as Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] >= '2014-01-01' AND  T0.[DocDate] <= '2014-12-31' AND  T1.[TargetType] <> 14";
	$Resultado_Consulta_F14 = odbc_exec($Conexion_SQL, $Consulta_Monto_Factura_F14);
	$Monto_Total_F14 = odbc_result($Resultado_Consulta_F14, "Total");
	$facturas3 = "$". number_format($Monto_Total_F14, 2);
	odbc_close($Conexion_SQL);

	//Consulta de facturas de Clientes 2013
	$Consulta_Monto_Factura_F13 ="SELECT sum(T1.[TotalSumSy]) as Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] >= '2013-01-01' AND  T0.[DocDate] <= '2013-12-31' AND  T1.[TargetType] <> 14";
	$Resultado_Consulta_F13 = odbc_exec($Conexion_SQL, $Consulta_Monto_Factura_F13);
	$Monto_Total_F13 = odbc_result($Resultado_Consulta_F13, "Total");
	$facturas4 = "$". number_format($Monto_Total_F13, 2);
	odbc_close($Conexion_SQL);

//Facturas por año   --------------------------------------------------------------------------------------------

	//Consulta de ordenes de Venta
	$Consulta_Monto_Ordenes ="SELECT SUM ( T2.[TotalSumSy] ) as Total FROM ORDR T0  INNER JOIN OSLP T1 ON T0.SlpCode = T1.SlpCode INNER JOIN RDR1 T2 ON T0.DocEntry = T2.DocEntry WHERE T0.[DocDate] >= '".$_SESSION["Fecha_Inicial"]."' AND  T0.[DocDate] <= '".$_SESSION["Fecha_Final"]."' AND T0.[CANCELED] = 'N' AND  T1.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']."";
	$Resultado_Consulta2 = odbc_exec($Conexion_SQL, $Consulta_Monto_Ordenes);
	$Monto_Total2 = odbc_result($Resultado_Consulta2, "Total");
	$ordenes =  '$ ' . number_format($Monto_Total2, 2);
	odbc_close($Conexion_SQL);

	//Consulta de ordenes de Venta 2015
	$Consulta_Monto_Ordenes_O15 ="SELECT SUM ( T2.[TotalSumSy] ) as Total FROM ORDR T0  INNER JOIN OSLP T1 ON T0.SlpCode = T1.SlpCode INNER JOIN RDR1 T2 ON T0.DocEntry = T2.DocEntry WHERE T0.[DocDate] >= '2015-01-01' AND  T0.[DocDate] <= '2015-12-31' AND T0.[CANCELED] = 'N' AND  T1.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']."";
	$Resultado_Consulta2_O15 = odbc_exec($Conexion_SQL, $Consulta_Monto_Ordenes_O15);
	$Monto_Total2_O15 = odbc_result($Resultado_Consulta2_O15, "Total");
	$ordenes2 =  '$ ' . number_format($Monto_Total2_O15, 2);
	odbc_close($Conexion_SQL);

	//Consulta de ordenes de Venta 2014
	$Consulta_Monto_Ordenes_O14 ="SELECT SUM ( T2.[TotalSumSy] ) as Total FROM ORDR T0  INNER JOIN OSLP T1 ON T0.SlpCode = T1.SlpCode INNER JOIN RDR1 T2 ON T0.DocEntry = T2.DocEntry WHERE T0.[DocDate] >= '2014-01-01' AND  T0.[DocDate] <= '2014-12-31' AND T0.[CANCELED] = 'N' AND  T1.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']."";
	$Resultado_Consulta2_O14 = odbc_exec($Conexion_SQL, $Consulta_Monto_Ordenes_O14);
	$Monto_Total2_O14 = odbc_result($Resultado_Consulta2_O14, "Total");
	$ordenes3 =  '$ ' . number_format($Monto_Total2_O14, 2);
	odbc_close($Conexion_SQL);

	//Consulta de ordenes de Venta 2013
	$Consulta_Monto_Ordenes_O13 ="SELECT SUM ( T2.[TotalSumSy] ) as Total FROM ORDR T0  INNER JOIN OSLP T1 ON T0.SlpCode = T1.SlpCode INNER JOIN RDR1 T2 ON T0.DocEntry = T2.DocEntry WHERE T0.[DocDate] >= '2013-01-01' AND  T0.[DocDate] <= '2013-12-31' AND T0.[CANCELED] = 'N' AND  T1.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']."";
	$Resultado_Consulta2_O13 = odbc_exec($Conexion_SQL, $Consulta_Monto_Ordenes_O13);
	$Monto_Total2_O13 = odbc_result($Resultado_Consulta2_O13, "Total");
	$ordenes4 =  '$ ' . number_format($Monto_Total2_O13, 2);
	odbc_close($Conexion_SQL);

//Ordenes por año   --------------------------------------------------------------------------------------------
	//Consulta de ofertas de venta
	$Consulta_Monto_Ofertas ="SELECT SUM(T1.[TotalSumSy]) AS Total FROM OQUT T0  INNER JOIN QUT1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '".$_SESSION["Fecha_Inicial"]."' AND  T0.[DocDate] <= '".$_SESSION["Fecha_Final"]."' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']."";
    $Resultado_Consulta3 = odbc_exec($Conexion_SQL, $Consulta_Monto_Ofertas);
    $Monto_Total3 = odbc_result($Resultado_Consulta3, "Total");
    $ofertas =  '$ ' . number_format($Monto_Total3, 2);
    odbc_close($Conexion_SQL);

		//Consulta de ofertas de venta 2015
		$Consulta_Monto_Ofertas_OF15 ="SELECT SUM(T1.[TotalSumSy]) AS Total FROM OQUT T0  INNER JOIN QUT1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2015-01-01' AND  T0.[DocDate] <= '2015-12-31' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']."";
			$Resultado_Consulta3_OF15 = odbc_exec($Conexion_SQL, $Consulta_Monto_Ofertas_OF15);
			$Monto_Total3_OF15 = odbc_result($Resultado_Consulta3_OF15, "Total");
			$ofertas2 =  '$ ' . number_format($Monto_Total3_OF15, 2);
			odbc_close($Conexion_SQL);

			//Consulta de ofertas de venta 2014
			$Consulta_Monto_Ofertas_OF14 ="SELECT SUM(T1.[TotalSumSy]) AS Total FROM OQUT T0  INNER JOIN QUT1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2014-01-01' AND  T0.[DocDate] <= '2014-12-31' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']."";
				$Resultado_Consulta3_OF14 = odbc_exec($Conexion_SQL, $Consulta_Monto_Ofertas_OF14);
				$Monto_Total3_OF14 = odbc_result($Resultado_Consulta3_OF14, "Total");
				$ofertas3 =  '$ ' . number_format($Monto_Total3_OF14, 2);
				odbc_close($Conexion_SQL);

				//Consulta de ofertas de venta 2013
				$Consulta_Monto_Ofertas_OF13 ="SELECT SUM(T1.[TotalSumSy]) AS Total FROM OQUT T0  INNER JOIN QUT1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2013-01-01' AND  T0.[DocDate] <= '2013-12-31' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']."";
					$Resultado_Consulta3_OF13 = odbc_exec($Conexion_SQL, $Consulta_Monto_Ofertas_OF13);
					$Monto_Total3_OF13 = odbc_result($Resultado_Consulta3_OF13, "Total");
					$ofertas4 =  '$ ' . number_format($Monto_Total3_OF13, 2);
					odbc_close($Conexion_SQL);

//Ofertas por año   --------------------------------------------------------------------------------------------

    //Consulta de Back Order
    $Consulta_Monto_Back ="SELECT SUM( T1.[OpenQty] *  T1.[Price]  ) as Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '".$_SESSION["Fecha_Inicial"]."' AND T0.[DocDate] <= '".$_SESSION["Fecha_Final"]."' AND   T1.[OpenQty] <> 0 AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']."";
    $Resultado_Consulta4 = odbc_exec($Conexion_SQL, $Consulta_Monto_Back);
    $Monto_Total4 = odbc_result($Resultado_Consulta4, "Total");
    $back =  '$ ' . number_format($Monto_Total4, 2);
    odbc_close($Conexion_SQL);

		//Consulta de Back Order 2015
    $Consulta_Monto_Back_B15 ="SELECT SUM( T1.[OpenQty] *  T1.[Price]  ) as Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2015-01-01' AND T0.[DocDate] <= '2015-12-31' AND   T1.[OpenQty] <> 0 AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']."";
    $Resultado_Consulta4_B15 = odbc_exec($Conexion_SQL, $Consulta_Monto_Back_B15);
    $Monto_Total4_B15 = odbc_result($Resultado_Consulta4_B15, "Total");
    $back2 =  '$ ' . number_format($Monto_Total4_B15, 2);
    odbc_close($Conexion_SQL);

		//Consulta de Back Order 2014
    $Consulta_Monto_Back_B14 ="SELECT SUM( T1.[OpenQty] *  T1.[Price]  ) as Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2014-01-01' AND T0.[DocDate] <= '2014-12-31' AND   T1.[OpenQty] <> 0 AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']."";
    $Resultado_Consulta4_B14 = odbc_exec($Conexion_SQL, $Consulta_Monto_Back_B14);
    $Monto_Total4_B14 = odbc_result($Resultado_Consulta4_B14, "Total");
    $back3 =  '$ ' . number_format($Monto_Total4_B14, 2);
    odbc_close($Conexion_SQL);

		//Consulta de Back Order 2013
    $Consulta_Monto_Back_B13 ="SELECT SUM( T1.[OpenQty] *  T1.[Price]  ) as Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2013-01-01' AND T0.[DocDate] <= '2013-12-31' AND   T1.[OpenQty] <> 0 AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']."";
    $Resultado_Consulta4_B13 = odbc_exec($Conexion_SQL, $Consulta_Monto_Back_B13);
    $Monto_Total4_B13 = odbc_result($Resultado_Consulta4_B13, "Total");
    $back4 =  '$ ' . number_format($Monto_Total4_B13, 2);
    odbc_close($Conexion_SQL);

//Fin de Sección de valores parte superior index   --------------------------------------------------------------------------------------------
 ?>
