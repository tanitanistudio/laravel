function deleteHandle(event){
    //　一旦フォームをストップ
    event.preventDefault;
    if(window.confirm('本当に削除していいですか？')){
        document.getElementById('delete-form').onsubmit();
    }else{
        alert('キャンセルしました');
    }
}