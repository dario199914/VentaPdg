<?php
include "../../data_base.php";
$producto = new DataBase();
$listado=$producto->readPro();
$list_cat=$producto->fill_list();
$list_pro=$producto->fill_list2();


?>
<link rel="stylesheet" href="media/font-awesome/css/font-awesome.css">
<!-- Begin Page Content -->
<div class="container-fluid" style="padding: 2%;">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Registro de Productos</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <!-- Modal -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Registrar Nuevo Producto
    </button>
    <br>
    <br>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 60%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Producto </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body" style="padding: 4%;">
                    <form class="row g-3" action="../../Contralador/usuarios.php" method="POST">
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre">
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Categoria</label>
                            <div class="dropdown mb-4 ">
                                <select class="form-control" name="slc_categoria" id="slc_categoria">
                                    <option value="">Selecciona</option>
                                    <?php  foreach ($list_cat as $cat): ?>
                                    <option value="<?php echo (int)$cat['CAT_ID'] ?>">
                                        <?php echo $cat['CAT_NOMBRE'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Proveedor</label>
                            <div class="dropdown mb-4 ">
                                <select class="form-control" name="slc_proveedor" id="slc_proveedor">
                                    <option value="">Selecciona</option>
                                    <?php  foreach ($list_pro as $pro): ?>
                                    <option value="<?php echo (int)$pro['PRV_ID'] ?>">
                                        <?php echo $pro['PRV_NOMBRE'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12" style="padding-top: 1%;">

                            <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                            <textarea class="form-control" id="txt_descripcion" name="txt_descripcion"
                                rows="3"></textarea>
                        </div>
                        <div class="col-md-6" style="padding-top: 2%;">
                            <label for="inputCity" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="txt_fecha" name="txt_fecha">
                        </div>
                        <div class="col-md-2" style="padding-top: 2%;">
                            <label for="inputState" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="txt_cantidad" name="txt_cantidad">
                        </div>
                        <div class="col-md-2" style="padding-top: 2%;">
                            <label for="inputZip" class="form-label">Ganancia($)</label>
                            <input type="text" class="form-control" id="txt_ganancia" name="txt_ganancia">
                        </div>
                        <div class="col-md-2" style="padding-top: 2%;">
                            <label for="inputZip" class="form-label">Precio($)</label>
                            <input type="text" class="form-control" id="txt_precio" name="txt_precio">
                        </div>

                </div>
                <div class="modal-footer" style="padding-right: 4%;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="send-form"
                        name="btn_registrar_producto">Registrar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tabla_producto" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Proveedor</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Proveedor</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <?php  
                            while ($row= mysqli_fetch_object($listado)){
                                
                                    $id=$row->PRO_ID;
                                    $nombre=$row->PRO_NOMBRE;
                                    $categoria=$row->CAT_NOMBRE;
                                    $proveedor=$row->PRV_NOMBRE;
                                    $precio=$row->PRO_PRECIO;
                                    $stock=$row->PRO_STOCK;
                                
                        ?>
                    <tbody>

                        <td><?php echo $id; ?></td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $categoria; ?></td>
                        <td><?php echo $proveedor; ?></td>
                        <td><?php echo $precio; ?></td>
                        <td><?php echo $stock; ?></td>
                        <td>
                            <div class="btn-group">
                               <!-- <a href="edit_product.php?id=<?php echo (int)$product['id'];?>"
                                    class="btn btn-info btn-xs" title="Editar" data-toggle="tooltip">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="delete_product.php?id=<?php echo (int)$product['id'];?>"
                                    class="btn btn-danger btn-xs" title="Eliminar" data-toggle="tooltip">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a> -->

                                <a data-bs-target="#exampleModal" class="edit" style="padding-right: 40%;" href="#"><i class="fas fa-edit"></i></a>
                                <a class="delete" href="#"><i class="fas fa-trash-alt"></i></a>

                            </div>
                        </td>

                        <?php }?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->