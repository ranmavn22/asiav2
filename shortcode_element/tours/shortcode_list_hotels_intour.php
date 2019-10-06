<?php
if (!defined('ABSPATH')) {
    die();
}
global $post;
$value_program_tour = get_post_meta($post->ID, 'wz_program_detail', true);
$array_hotel = array();
if(!empty($value_program_tour)){
    $i= 0;
    foreach ($value_program_tour as $item){
        $array_hotel[$i] = $item["hotels"];
        $i++;
    }
}
$hotel = array_count_values($array_hotel);
?>
<div>
    <table>
        <tr>
            <th><?php _e('Villes','wz')?></th>
            <th><?php _e('Hôtels','wz')?></th>
            <th><?php _e('Étoiles','wz')?></th>
            <th><?php _e('Nuits','wz')?></th>
        </tr>
        <?php if(!empty($hotel)) { foreach ($hotel as $item => $key){
			if($item != ""){
            $value = get_post_meta($item, 'wz_information_hotel', true);
            ?>
        <tr>
            <td><?php echo $value["city"]  ?></td>
            <td><?php echo $value["name_hotel"]?> <?php if($value["address"] !=''){?>( <?php echo $value["address"] ?> ) <?php }?></td>
            <td><?php
                if ($value['assess'] != '') {
                    $danhgia = $value['assess'];
                    $nloop = floor($danhgia);
                    for ($i = 0; $i < $nloop; $i++) {
                        echo '<i class="fa fa-star" aria-hidden="true"></i>';
                    }
                    if (($danhgia - $nloop) != 0) {
                        echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
                    }
                }
                ?></td>
            <td><?php echo $key ?></td>
        </tr>
        <?php }}} ?>
    </table>
</div>
