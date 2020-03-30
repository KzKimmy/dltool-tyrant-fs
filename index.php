<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tyrant Fansub</title>
    <link rel="stylesheet" href="css/bulma.min.css">
</head>

<body>
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Tyrant Fansub
                </h1>
                <h2 class="subtitle">
                    Anime Subthai
                </h2>
            </div>
        </div>
    </section>
    <div class="container">

        <?php
require_once('simple_html_dom.php');
 
$domain1 = 'https://tyrantfs.wixsite.com/tyrantfs/seton';
$domain2 = 'https://tyrantfs.wixsite.com/tyrantfs/nekopara';
$seton = file_get_html($domain1);
$nekopara = file_get_html($domain2);
?>
<br>
        <h3 class="title is-3">Murenase! Seton Gakuen</h3>
        <div class="table-container">
            <table class="table is-hoverable">
                <tbody>
                    <?php
                    $ep = 1;
                        foreach($seton->find('.txtNew a') as $el) {
                        if($el->plaintext != null && $el->plaintext == 'DL') { ?>
                    <tr>
                        <td>Episode <?php echo $ep; ?></td>
                        <td>
                            <a href="<?php echo $el->href; ?>" target="_blank"><?php echo $el->href; ?></a>
                        </td>
                    </tr>
                    <?php
                        $ep++;
                        }
                    }?>
                </tbody>
            </table>
        </div>
        <br>
        <h3 class="title is-3">Nekopara</h3>
        <div class="table-container">
            <table class="table is-hoverable">
                <tbody>
                    <?php
                    $ep = 1;
                        foreach($nekopara->find('.txtNew a') as $el) {
                        if($el->plaintext != null && $el->plaintext == 'DL') { ?>
                    <tr>
                        <td>Episode <?php echo $ep; ?></td>
                        <td>
                            <a href="<?php echo $el->href; ?>" target="_blank"><?php echo $el->href; ?></a>
                        </td>
                    </tr>
                    <?php
                        $ep++;
                        }
                    }?>
                </tbody>
            </table>
        </div>
        <?php
    $seton->clear();
    $nekopara->clear();
    unset($seton);
    unset($nekopara);
    ?>
    </div>
</body>

</html>