<?php
include './parts/header.php';
$auth->requireGuest();
?>

<div class="container">
    <?php ErrorHelper::displayMessage() ?>
    <div class="row">

        <div class="col-12">

            <h1>HOME</h1>

        </div>
        <div class="col-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus sunt repellat corrupti
            deleniti quisquam non! Error, nesciunt provident nisi aliquid ea harum corporis commodi? Cupiditate modi quo
            quisquam ab.</div>
        <div class="col-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ex suscipit odio magnam
            nihil sint neque pariatur quasi sapiente. Earum omnis nihil, magni temporibus ipsa et excepturi consequuntur
            veritatis eius.</div>
        <div class="col-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum porro dignissimos facere
            voluptatem, nobis animi fuga quidem accusantium aperiam? Iusto vitae incidunt rerum iste est nam magnam
            aliquam ab voluptatum?</div>
    </div>
</div>

<?php include './parts/footer.php' ?>