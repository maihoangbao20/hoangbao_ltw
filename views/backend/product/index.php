<?php
use App\Models\Product;
$list = Product::where('status','!=',0)->OrderBy('created_at','DESC')->get();
?>
<?php require_once '../views/backend/header.php';?>
      <!-- CONTENT -->
      <form action="" method="post">
         <div class="content-wrapper">
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả sản phẩm</h1>
                        <a href="product_create.html" class="btn btn-sm btn-primary">Thêm sản phẩm</a>
                     </div>
                  </div>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="card">
                  <div class="card-header">
                     <select name="" id="" class="form-control d-inline" style="width:100px;">
                        <option value="">Xoá</option>
                     </select>
                     <button class="btn btn-sm btn-success">Áp dụng</button>
                  </div>
                  <div class="card-body">
                     <table class="table table-bordered" id="mytable">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox">
                              </th>
                              <th class="text-center" style="width:130px;">Hình ảnh</th>
                              <th>Tên sản phẩm</th>
                              <th>Tên danh mục</th>
                              <th>Tên thương hiệu</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php if (count($list) > 0) : ?> 
                                 <?php foreach ($list as $item) : ?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td>
                                 <img src="../public/images/product.jpg" alt="product.jpg">
                              </td>
                              <td>
                                 <div class="name">
                                    Tên sản phẩm
                                 </div>
                                 <div class="function_style">
                                 <?php if($item->status==1):?>
                                             <a href="index.php?option=category&cat=status&id=<?=$item->id;?>" class="btn btn-success btn-xs">
                                                <i class="fas fa-toggle-on"></i> Hiện
                                                </a> |
                                             <?php else:?>
                                                <a href="index.php?option=category&cat=status&id=<?=$item->id;?>" class="btn btn-danger btn-xs">
                                                <i class="fas fa-toggle-off"></i> Ẩn
                                                </a> |
                                             <?php endif;?>
                                             <a href="index.php?option=category&cat=edit&id=<?=$item->id;?>"class="btn btn-primary btn-xs">
                                             <i class="far fa-edit"></i></i> Chỉnh sửa
                                             </a> |
                                             <a href="index.php?option=category&cat=show&id=<?=$item->id;?>"class="btn btn-info btn-xs">
                                             <i class="far fa-eye"></i></i> Chi tiết
                                             </a> |
                                             <a href="index.php?option=category&cat=delete&id=<?=$item->id;?>"class="btn btn-danger btn-xs">
                                             <i class="far fa-trash-alt"></i></i> Xoá
                                             </a>                        
                                 </div>
                              </td>
                              <td>Tên danh mục</td>
                              <td>Tên Thuong hiệu</td>
                           </tr>
                           <?php endforeach;?>
                              <?php endif; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </section>
         </div>
      </form>
      <!-- END CONTENT-->
<?php require_once '../views/backend/footer.php';?>
