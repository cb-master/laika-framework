<?php
/* Smarty version 5.4.3, created on 2025-02-11 19:43:31
  from 'file:C:\xampp\htdocs\cbm-laika/views/_404.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67ab9a53821c31_76531892',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ff9b0e6b7d2a7cf96945a0f4742dee3838eb3ee' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cbm-laika/views/_404.tpl',
      1 => 1739299101,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67ab9a53821c31_76531892 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\cbm-laika\\views';
$_smarty_tpl->getCompiled()->nocache_hash = '40227290967ab9a537efe28_21864298';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_smarty_tpl->getValue('title');?>
</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body{
            width:100%;
            width:100%;
        }
        .body{
            width:100%;
            height:100vh;
            display:flex;
            align-items:center;
            justify-content: center;
        }
        img{
            display:block;
        }
        h1{
            color:red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="body">
        <div>
            <img src="<?php echo $_smarty_tpl->getValue('webhost');?>
/assets/images/page-not-found.svg" alt="" width="400">
            <h1>Page Not Found!</h1>
        </div>
    </div>
</body>
</html><?php }
}
