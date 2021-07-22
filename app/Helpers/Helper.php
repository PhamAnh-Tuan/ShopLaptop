<?php

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

// function getcategory($mang,$parent,$shift){
//     foreach ($mang as $row) {
//         if($row->cat_parent_id==$parent){
//            echo '';
//             getcategory($mang,$row['cat_id'],$shift.'<div id="sportswear" class="panel-collapse collapse">
//             <div class="panel-body">
//                 <ul>
//                     <li><a href="#">Nike </a></li>
//                     <li><a href="#">Under Armour </a></li>
//                     <li><a href="#">Adidas </a></li>
//                     <li><a href="#">Puma</a></li>
//                     <li><a href="#">ASICS </a></li>
//                 </ul>
//             </div>
//         </div>');
//         }
//     }
// }


function getcategory($mang, $parent, $shift)
{
    foreach ($mang as $row) {
        if ($row->cat_parent_id == $parent) {
            echo '<div class="panel-body"><ul><li><a href="#">' . $row->cat_name . '</a></li></ul></div>';
        }
    }
}
// mở cho a control
function catchuoi($chuoi)
{

    $str = "Chuỗi bạn cần cắt, nội dung tin tức chẳng hạn."; //Tạo chuỗi
    $str = strip_tags($str); //Lược bỏ các tags HTML
    if (strlen($str) > 100) { //Đếm kí tự chuỗi $str, 100 ở đây là chiều dài bạn cần quy định
        $strCut = substr($str, 0, 100); //Cắt 100 kí tự đầu
        $str = substr($strCut, 0, strrpos($strCut, ' ')) . '... <a href="Link cần dẫn">Read More</a>'; //Tránh trường hợp cắt dang dở như "nội d... Read More"
    }
    echo $str;
}



function showMenu($category, $parentId, $char)
{
    foreach ($category as $value) {
        if ($value['cat_parent_id'] == $parentId) {
            echo '
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear' . $value['cat_id'] . '">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        ' . $char . $value['cat_name'] . '
                    </a>
                </h4>
            </div>
            <div id="sportswear' . $value['cat_id'] . '" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
        ';
            foreach ($category as $value1) {
                if ($value1->cat_parent_id == $value['cat_id']) {
                    echo '
                        <li><a data-parent="#accordian" href="'.route('category.sp',['slug'=>$value1->cat_slug]).'">' . $value1['cat_name'] . '</a></li>
                   ';
                }
            }
            echo '
                    </ul>
                </div>
            </div>
            ';
            $new_parent = $value1['cat_id'];
            showMenu($category,$new_parent,$char.'--|');
        }
    }
}
