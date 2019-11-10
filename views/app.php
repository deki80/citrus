
    <section class="home">
        <header>
            <h1>Citrus Company - Our Product List</h1>
        </header>
        <article class="grid-container">

            <?php foreach ($data['products'] as $single) : ?>

                <div class="grid-item">
                    <div><img src="/views/media/img/<?= $single['product_image'] ?>" alt="product" class="product-image"></div>
                    <div><?= $single['product_title'] ?></div>
                    <div><p><?= $single['product_description'] ?></p></div>
                </div>

            <?php endforeach; ?>

        </article>
        <article class="comments">
            <?php if($data['comments']): ?>
                <header>
                    <h3>Users wrote to us:</h3>
                </header>

                <?php foreach ($data['comments'] as $comment): ?>
                    <div class="single-comment">
                        <p><em><?= $comment['comment_name'] ?> on <?= $comment['comment_date'] ?></em></p>
                        <p><?= $comment['comment_text'] ?></p>
                        <hr>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </article>
        <article id="comment">
            <header>
                <h3>Send us your comment:</h3>
            </header>
            <form class="form" action="/" method="post">
                <label for="name" class="first-name">Name</label>
                <input id="name" name="name" type="text" required>

                <label for="email">Email</label><span id="error"></span>
                <input id="email" name="email" type="text" required>


                <label for="txt" class="txt">Comment</label>
                <textarea name="comment" id="txt" rows="10" required></textarea>

                <button type="submit" id="submit-btn">Submit</button>
            </form>
        </article>
    </section>

