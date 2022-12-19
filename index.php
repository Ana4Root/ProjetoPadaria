<?php
if(isset($_POST['pesquisa']))
{
    $pesquisar = $_POST['pesquisar'];
    $query = "SELECT * FROM `padaria` WHERE CONCAT(`Data`, `Farinha`, `Ovos`, `Sal`, `Acucar`, `Oleo`, `Fermento`, `Total`) LIKE '%".$pesquisar."%'";
    $resultado = filtrartabela($query);
}
else {
    $query = "SELECT * FROM `padaria`";
    $resultado = filtrartabela($query);
}

function filtrartabela ($query)
{
    $connect = mysqli_connect("localhost", "root", "", "testes");
    $filtrarresultado = mysqli_query($connect, $query);
    return $filtrarresultado;
    /*$columns = array('order_Data', 'order_Farinha', 'order_Ovos', 'order_Sal', 'order_Acucar', 'order_Oleo', 'order_Fermento', 'order_Total');*/
}

?>


<!DOCTYPE html>
<html>
    <head>
       <link rel="stylesheet" href="style.css">
               <title>Padaria Bom Dia</title>
    </head>
    <body>
    <h1> Padaria Bom Dia </h1>
        <div class="principal">
        <table id="tableData" class="table table-bordered table-striped">
        <thead class="tbl-header">    
        <script type="text/javascript" src="script.js"></script>
        <form action="index.php" method="post">
        <div class="container">
		<h2>Escolha a quantidade de linhas</h2>
				<div class="form-group">
			 		<select class  ="form-control" name="state" id="maxRows">
						 <option value="5000">Todos os dados</option>
						 <option value="5">5</option>
						 <option value="10">10</option>
						 <option value="15">15</option>
						 <option value="20">20</option>
						 <option value="50">50</option>
						 <option value="70">70</option>
						 <option value="100">100</option>
						</select>
        <div class="search">
            <input class="searchTerm" type="text" name="pesquisar" placeholder="Digite a Data">
            <input class="searchButton" type="submit" name="pesquisa" value="pesquisa">
        </div>
			  	</div>
        
                <tr>
                    <th>Data</th>
                    <th>Farinha</th>
                    <th>Ovos</th>
                    <th>Sal</th>
                    <th>Açucar</th>
                    <th>Óleo</th>
                    <th>Fermento</th>
                    <th>Total</th>
                </tr>
        </thead>
        <tbody class="tbl-content">
            <?php while($row = mysqli_fetch_array($resultado)) : ?>
                <tr>
                    <td><?php echo $row['Data'];?> </td>
                    <td><?php echo $row['Farinha'];?> </td>
                    <td><?php echo $row['Ovos'];?> </td>
                    <td><?php echo $row['Sal'];?> </td>
                    <td><?php echo $row['Acucar'];?> </td>
                    <td><?php echo $row['Oleo'];?> </td>
                    <td><?php echo $row['Fermento'];?> </td>
                    <td><?php echo $row['Total'];?> </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
        </table>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript"  src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript"  src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function(){
            $('#tableData').dataTable();
        });
        </script>
        </div>
        </form>
        </div>
    </body>
</html>

