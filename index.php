<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>reveal.js</title>

    <link rel="stylesheet" href="dist/reset.css">
    <link rel="stylesheet" href="dist/reveal.css">
    <link rel="stylesheet" href="dist/theme/black.css">

    <!-- Theme used for syntax highlighted code -->
    <link rel="stylesheet" href="plugin/highlight/monokai.css">
</head>

<body>
    <?php 
    $file =json_decode(file_get_contents('data.json'), true);
    // echo var_dump($file[0]["type"]);
    ?>
    <div class="reveal">
        <div class="slides">
        <?php foreach ($file as $data) {?>
            <?php 
                echo $data["type"] == "web";
            ?>
            <?php if ($data["type"] == "web") {?>
                <section data-autoslide="<?php $data['duration']?>">
                    <iframe data-autoplay width="700" height="540" src="<?php $data['url']?>" frameborder="0"></iframe>
                </section>
            <?php }?>
            <?php if ($data["type"] == "video") {?>
                <section>
                    <video src="<?php $data['url']?>" data-autoplay></video>
                </section>
            <?php }?>
        <?php }?>
            
        </div>
    </div>

    <script src="dist/reveal.js"></script>
    <script src="plugin/notes/notes.js"></script>
    <script src="plugin/markdown/markdown.js"></script>
    <script src="plugin/highlight/highlight.js"></script>
    <script>
        // More info about initialization & config:
        // - https://revealjs.com/initialization/
        // - https://revealjs.com/config/
        Reveal.initialize({
            controls: false,
            hash: false,
            autoSlide: 10000,
            autoSlideStoppable: false,
            progress: false,
            transition: 'none',
            loop: true,
            // Learn about plugins: https://revealjs.com/plugins/
            plugins: [RevealMarkdown, RevealHighlight, RevealNotes]
        });
    </script>
</body>

</html>