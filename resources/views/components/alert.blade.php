<!-- Note: class .show is used for demo purposes. Remove it when using it in the real project. -->
<style>
  .alert-con{
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 20px;
    right: 30px;
    height: fit-content;
    
  }
.alert{
 
  
  box-shadow: 0px 4px 39px rgba(0, 0, 0, 0.1);
  border-radius: 24px;
  align-items: center;
  display: flex;
  top:20px;
}
.bx{
  font-size: 19px;
  padding: 0 6px;
}
</style>
<div class="alert-con">
  <div class="alert alert-danger mb-0 alert-dismissible fade show " id="alert" role="alert" data-mdb-color="secondary">
    <i class='bx bx-error-circle' ></i>
  {{$text}}
    <button type="button" class="btn-close " data-mdb-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
