<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $rowPerpage = 10;
    $perRow = $page * $rowPerpage - $rowPerpage;

    $sql="SELECT * FROM category ORDER BY cat_id ASC LIMIT $perRow,$rowPerpage";
    $query=mysqli_query($connect,$sql);

    $totalRow = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM category"));
    $totalPage = ceil($totalRow/$rowPerpage);

    $listPage = "";
    for($i= 1;$i<=$totalPage;$i++){
        if($page==$i){
            $listPage .= '<li class="active"><a href="index.php?page_layout=category&page='.$i.'">'.$i.'</a></li>';
        }else{
            $listPage .= '<li><a href="index.php?page_layout=category&page='.$i.'">'.$i.'</a></li>';
        }
    }
?>

<div class="container-content-admin">
    <h1 class="content-admin-title">Quản lý danh mục</h1>
    <div style="margin: 4rem 0 0 2.4rem;"><a class="btn btn_them js-them">Thêm mới</a></div>
    <div class="content-admin-table">
        <table class="table" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <tbody class="cat-item">

                <?php
                    while($row=mysqli_fetch_array($query)){
                ?>

                <tr>
                    <td><?php echo $row['cat_id'];?></td>
                    <td><?php echo $row['cat_name'];?></td>
                    <td><a href="./category/edit.php?cat_id=<?php echo $row['cat_id'];?>" class="btn btn_sua">Sửa</a>
                        <a onclick="return xoaDm();" href="./category/delete.php?cat_id=<?php echo $row['cat_id'];?>" class="btn btn_xoa">Xóa</a>
                    </td>
                </tr>

                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <ul class="cat-page">
        <?php
            echo $listPage;
        ?>
    </ul>

</div>
<script>
    function xoaDm(){
        var conf =confirm("Bạn có chắc chắn muốn xóa danh mục này không?");
        return conf;
    }
</script>
<?php
    include_once("add.php"); //Add modal
    // include("edit.php"); //Edit modal
    
?>
