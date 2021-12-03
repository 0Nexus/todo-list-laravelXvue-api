<template>
 <div>

     <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Task info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="" class="nav justify-content-center">
              <div class="form-group">
                  <table class="table-responsive ">
                      <tr>
            <label for="title">Task's name</label>
            </tr> 
            <tr>
          <input type="text" id="title" name="title" v-model="todoToEdit">
          </tr> 
          <tr> <label for="desc">description</label>
          </tr>
         <tr> <input type="text" name="desc" id="desc" v-model="todoToEdit">
          </tr>
           <tr> <label for="deadline">deadline</label>
         </tr> 
         <tr> <input type="date" name="deadline" id="deadline" v-model="ths.todoToEdit.deadline">
          </tr>
          </table>
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-seconmodaldary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" @click="update()" data-dismiss="modal" >Save changes</button>
            </div>
         </div>
     </div>
    </div>
    
 </div>
    
</template>
<script>
export default {
    props : ['todoToEdit'],
    methods: {
      update(){
        axios.patch('api/todos/edit' + this.todoToEdit.todo_id, {
          title: this.todoToEdit.title,
          desc: this.todoToEdit.desc,
          deadline: this.todoToEdit.deadline
        }
        )
        .then(Response=> this.$emit('todo-updated', Response))
        .catch(Error=>console.log(Error));
      }
    }
}
</script>