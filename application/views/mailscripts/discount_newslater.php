
<table border="2" bgcolor="gray" align="center">
    <tr><td>all product are 20% discount</td></tr>
    <th>product image</th>
    <th>product name</th>
    <th>product price</th>
    
<?php 
foreach ($all_product as $v_product) {
?>
    <tr>
        <td><img style="width:200px;height: 100px; " src="<?php echo base_url(); ?><?php echo $v_product->product_image ?>" alt="Image 01" /></td>
        <td><?php echo $v_product->product_name;?></td>
        <td><?php echo $v_product->product_price;?>BDT</td>
    </tr>

<?php }?>
</table>

