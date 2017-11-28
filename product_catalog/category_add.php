<?php include '../view/header.php'; ?>
<main>
    <h1>Add Category</h1>
    <form action="index.php" method="post" id="add_category_form">
        <input type="hidden" name="action" value="add_category">
        <br>
        <label>Add New Category Name</label>
        <input type="text" name="category_name" />
        <br>
        <br>
        <label>&nbsp;</label>
        <input type="submit" value="Add Category" />
        <br>

    </form>
    <p class="last_paragraph">
        <a href="../product_catalog/index.php">View Category List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>