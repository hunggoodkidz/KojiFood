<?php 
    require_once("/entities/product.class.php");

    if(isset($_POST['btnsubmit'])){
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtCateID"];
        $price = $_POST["txtPrice"];
        $quantity = $_POST["txtquantity"];
        $description = $_POST["txtdesc"];
        $picture = $_POST["txtpic"];
        $newProduct  = new Product ($cateID, $price, $quantity, $description, $productName,$picture);
        $result = $newProduct->save();

        if(!$result){
            header("Location: add_product.php?failure");
        }else {
            header(":ocation: add_product.php?inserted");
        }
    }
?>

<?php 
    if(isset($_GET["inserted"])){
        echo "<h2>them san pham thanh cong </h2>";
    }
?>

<form method="post">
    <div class="row">
        <div class="lbltitle">
            <label>ten san pham</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtName"
                value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "" ; ?> " />
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            <label>mo ta ten san pham</label>
        </div>
        <div class="lblinput">
            <textarea name="txtdesc" cols="21" rows="10"
                value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ; ?> "> </textarea>
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            <label>so luong san pham</label>
        </div>
        <div class="lblinput">
            <textarea name="txtquantity" cols="21" rows="10"
                value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : "" ; ?> "> </textarea>
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            <label>gia san pham</label>
        </div>
        <div class="lblinput">
            <textarea name="txtprice" cols="21" rows="10"
                value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : "" ; ?> "> </textarea>
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            <label>loai san pham</label>
        </div>
        <div class="lblinput">
            <textarea name="txtdesc" cols="21" rows="10"
                value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ; ?> "> </textarea>
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            <label>hinh anh san pham</label>
        </div>
        <div class="lblinput">
            <textarea name="txtpic" cols="21" rows="10"
                value="<?php echo isset($_POST["txtpic"]) ? $_POST["txtpic"] : "" ; ?> "> </textarea>
        </div>
    </div>
    <div class="row">
        <div class="submid">
            <input type="submit" name="btnsubmit" value="them san pham" />
        </div>
    </div>
</form>

<?php include_once('footer.php'); ?>