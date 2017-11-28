<?php include '../view/header.php'; ?>
<main>
    <h1>Category List hhh</h1>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo $category['categoryName']; ?></td>
                
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_category">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="last_paragraph">
            <a href="category_add.php">Add Category</a>
        </p>
        <p class="last_paragraph">
            <a href="../product_manager/index.php">List Product</a>
        </p>

    </section>


    
</main>
<?php include '../view/footer.php'; ?>