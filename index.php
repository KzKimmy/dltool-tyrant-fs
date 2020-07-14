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
$get_project = 'https://tyrantfs.wixsite.com/tyrantfs/projects';
$dcp_project = file_get_html($get_project);
$project_count = 1;
foreach($dcp_project->find('.txtNew a') as $el) {
    if($el->plaintext != null && $el->href != 'https://tyrantfs.wixsite.com/tyrantfs/projects') {
        $domain = 'domain'.$project_count;
        $get_url = $el->href;
        $title = file_get_html($get_url);
    ?>
        <h3 class="title is-3"><?php echo $el->plaintext; ?></h3>
        <div class="table-container">
            <table class="table is-hoverable">
                <tbody>
                    <?php
                    $ep = 1;
                        foreach($title->find('.txtNew a') as $el) {
                        if($el->plaintext != null or ($el->plaintext == 'DL' or $el->plaintext == 'MEGA' )) { ?>
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
        $project_count++;
    }
}
?>
    </div>
    <?php
    $title->clear();
    unset($title);
    ?>
    </div>
</body>

</html>