<?php
require 'includes/header.php';
if(!isset($_SESSION['cart']))$_SESSION['cart']=[];
if(isset($_GET['add'])){$_SESSION['cart'][(int)$_GET['add']]=($_SESSION['cart'][(int)$_GET['add']]??0)+1;redirect('cart.php');}
if(isset($_GET['remove'])){unset($_SESSION['cart'][(int)$_GET['remove']]);redirect('cart.php');}
$items=[];$ids=array_keys($_SESSION['cart']);
if($ids){$in=implode(',',array_fill(0,count($ids),'?'));$st=$pdo->prepare("SELECT * FROM products WHERE id IN ($in)");$st->execute($ids);$items=$st->fetchAll();}
?>
<section class="page-head"><div class="container"><h1>Enquiry Cart</h1><p>Review products before requesting a quotation.</p></div></section><div class="container py-5"><div class="table-responsive bg-white rounded-4 shadow-sm"><table class="table align-middle mb-0"><thead><tr><th>Product</th><th>Price</th><th>Qty</th><th></th></tr></thead><tbody><?php foreach($items as $p):?><tr><td><?=e($p['product_name'])?></td><td><?=money($p['discount_price']?:$p['price'])?></td><td><?=$_SESSION['cart'][$p['id']]?></td><td><a class="btn btn-sm btn-outline-danger" href="cart.php?remove=<?=$p['id']?>">Remove</a></td></tr><?php endforeach;if(!$items):?><tr><td colspan="4" class="text-center p-5">Your enquiry cart is empty.</td></tr><?php endif;?></tbody></table></div><?php if($items):?><div class="text-end mt-4"><a class="btn btn-primary btn-lg" href="quote.php">Request Quote</a></div><?php endif;?></div>
<?php require 'includes/footer.php'; ?>