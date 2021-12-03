<template>
    <!-- Button trigger modal -->
    <div class="container my-3" >
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add new task
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Task info</h5>
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
          <input type="text" id="title" name="title" v-model="title">
          </tr> 
          <tr> <label for="desc">description</label>
          </tr>
         <tr> <input type="text" name="desc" id="desc" v-model="desc">
          </tr>
           <tr> <label for="deadline">deadline</label>
         </tr> 
         <tr> <input type="date" name="deadline" id="deadline" v-model="deadline">
          </tr>
          </table>
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-seconmodaldary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" @click="TaskStore()" data-dismiss="modal">Save changes</button>
            </div>
         </div>
     </div>
    </div>
    </div>
</template>
<script>
export default {
    data() {
        return{
        title : '',
        desc : '',
        deadline : ''
        }
    },
    methods : {
        TaskStore(){
                axios.post('api/getdata', {
                    title : this.title,
                    desc : this.desc,
                    deadline : this.deadline
                    })
                  .then(Response => this.$emit('task-added', Response))
                  .catch(error => console.log(error));    
                }
    }
}
</script>