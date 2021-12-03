<template>
 
    <div class="container">
            <Add-component @task-added="refresh"></Add-component>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center"  v-for="todo in todos" :key="todo.todos_id">
                <a href="">{{ todo.title }}</a>
                <div>
                <button class="btn btn-secondary" data-toggle="modal" data-target="#editModal" @click="getTask(todo.todo_id)">Edit</button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" @click="deletetask(todo.todo_id)">delete</button>
                </div>  
            </li>
            <Edit-component v-bind:todoToEdit="todoToEdit" @todo-updated="refresh">
                
            </Edit-component>
        </ul>


    </div>


</template>
<script>
export default {
    data(){
        return{
            todos: {},
            todoToEdit: ''
        }
    },
    created(){
        axios.get('api/getdata')
        .then(Response=> this.todos = Response.data)
        .catch(error=> console.log(error));
    },
    mounted(){
        console.log('mounted all');
    },
    methods: {
 
        refresh(todos){
            this.todos = todos.data
        },
        getTask(todo_id){
            axios.get('api/todos/edit/' + todo_id)
            .then(Response => this.todoToEdit = Response.data)
            .catch(Error => console.log(Error));
        },
        deletetask(todo_id){
            axios.delete('api/todos/' +todo_id)
            .then(Response=> this.todos = Response.data)
            .catch(Error => console.log(error));
        }
    }
    

}


</script>