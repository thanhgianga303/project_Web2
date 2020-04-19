function kiemTraQuyen(role,id)
{
	var quyen=role;
    if(role=="Q2"){
    	if(id=="3"||id=="4"||id=="5"||id=="6"||id=="5"||id=="7") {
    		window.location.assign('admin.php');
    		alert("Bạn không đủ quyền để vào danh mục này"); 
    	}
    }  
}
