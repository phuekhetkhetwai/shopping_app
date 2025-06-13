<?php
include "layout/header.php";
?>
        <!-- Start Content Area -->
        <section style="margin-top: 50px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-9 ms-auto">
                        <a href="create.php" class="btn btn-success mb-3"><i class="fa-solid fa-plus me-2"></i>New Blog</a>
                        <div class="card">
                            <div class="card-body">
                                <table class="table tabel-striped">
                                    <tr>
                                        <th>No.</th>
                                        <th style="width: 15%;">title</th>
                                        <th>Content</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php $id=0 ?>
                                    <?php foreach($datas as $data): ?>
                                        <tr>
                                            <td><?php echo ++$id ?>.</td>
                                            <td><?php echo escape($data->title) ?></td>
                                            <td><?php echo strlen($data->content) > 100 ? escape(substr($data->content,0 , 100)) . " ..." : escape($data->content) ?></td>
                                            <td><a href="_actions/photos/<?php echo $data->image ?>"><i class="fa-solid fa-image me-2 text-dark"></i><?php echo $data->image ?></a></td>
                                            <td>
                                                <a href="edit.php?id=<?php echo $data->id ?>"><i class="fa-solid fa-pen"></i></a>
                                                <a href="_actions/delete.php?id=<?php echo $data->id ?>" class="text-danger ms-3" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa-solid fa-trash-alt"></i></a>

                                            </td>
                                        </tr>
                                    <?php endforeach ?>    
                                </table>

                                <div class="float-end">
                                    <ul class="pagination">
                                        <li class="page-item"><a href="?pageno=1" class="page-link">first</a></li>
                                        <li class="page-item <?php echo $pageno <= 1 ? "disabled" : "" ?>"><a href="<?php echo $pageno <= 1 ? "#" : "?pageno=".($pageno-1) ?>" class="page-link"><i class="fa-solid fa-angles-left"></i></a></li>
                                        <li class="page-item"><a href="#" class="page-link"><?= $pageno ?></a></li>
                                        <li class="page-item <?php echo $pageno >= $total_pages ? "disabled" : "" ?>"><a href="<?php echo $pageno >= $total_pages ? "#" : "?pageno=".($pageno+1) ?>" class="page-link"><i class="fa-solid fa-angles-right"></i></a></li>
                                        <li class="page-item"><a href="?pageno=<?= $total_pages ?>" class="page-link">last</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content Area -->

    <!-- Start Footer Section -->
<?php include "layout/footer.php"; ?>