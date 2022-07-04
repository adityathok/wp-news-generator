<?php
//get data from option [wpnewsgen]
$dataoption = get_option('wpnewsgen');
$apikey     = isset($dataoption['apikey'])?$dataoption['apikey']:'';

//get all category
$allcats    = get_categories(array(
    'exclude'   => [1],
    'hide_empty' => false,
));
?>

<div class="wrap">
    <h2>WP News Generator</h2>

    <div class="wpnewsgen-config-js">
        <input type="hidden" name="apikey" value="<?php echo $apikey;?>">
    </div>

    <div class="wpnewsgen-main">
        <div class="wpnewsgen-loadnews-main">
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th>API KEY newsapi.org</th>
                        <td>
                            <input type="text" value="<?php echo $apikey;?>" name="apikey" id="apikey" class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th>Code Country</th>
                        <td>
                            <input type="text" value="id" name="country" id="country" class="regular-text">
                        </td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            <div class="button button-primary wpnewsgen-run">Load News</div>
        </div>
        <div class="wpnewsgen-resultnews-main">
            <div class="wpnewsgen-layout-default wpnewsgen-card-post" data-node="un00">
                <form action="" method="post">
                    <div class="card-title">
                        <input class="post-selected" name="post_selected" type="checkbox" value="0">
                        <span class="post-title">Judul Post</span>
                        <div class="icon-toggle" data-node="un00">
                            <span class="dashicons dashicons-arrow-down"></span>
                        </div>
                        <input type="hidden" name="post_title" value="Judul Post">
                        <input type="hidden" name="post_status" value="publish">
                        <input type="hidden" name="post_type" value="post">
                        <input type="hidden" name="post_author" value="<?php echo get_current_user_id();?>">
                        <input type="hidden" name="url_post_image" value="/">
                    </div>
                    <div class="card-body">
                        <div class="form-field-col">
                            <label class="form-field-label">Category Post</label>
                            <fieldset>
                                <?php foreach( $allcats as $cats => $cat): ?>
                                    <label for="category">
                                        <input name="category" type="checkbox" id="category<?php echo $cat->term_id; ?>" value="<?php echo $cat->term_id; ?>">
                                        <?php echo $cat->name; ?> (<?php echo $cat->count; ?>)
                                    </label>
                                <?php endforeach; ?>
                            </fieldset>
                        </div>
                        <div>
                            <label class="form-field-label" for="post_content">Content Post</label>
                            <textarea name="post_content" class="large-text" cols="30" rows="10">Content post</textarea>
                        </div> 
                    </div>
                </form>
            </div>
            <div class="wpnewsgen-layout-datanews"></div>
        </div>
    </div>

</div>