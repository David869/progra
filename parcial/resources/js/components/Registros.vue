
<template>

    <div>
        <h3>PROGRAMACIÓN COMPUTACIONAL IV 2021</h3>
         <h3>REGISTRO DE AUTOS</h3><br>
        
        <form @submit.prevent="addRegistro">
            <div >
                    <input type="text" placeholder="Nombre" v-model="registro.nombre"/>
            </div>
             <div class="form-group">
                    <textarea placeholder="Modelo" v-model="registro.modelo"></textarea>
            </div>

             <div class="form-group">
                    <textarea  placeholder="Precio" v-model="registro.precio"></textarea>
            </div>
            <button type="submit" @click="addUpdateRegistro()" class="btn btn-success">Save</button>
        </form>
    
        <br/>
        <h2>LISTADO DE AUTOS</h2>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>modelo</th>
                <th>Precio</th>
                <th>Actions</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <tr v-for="registro in registros " v-bind:key="registro.id">
                        <td> {{ registro.id }} </td>
                        <td> {{ registro.nombre }} </td>
                        <td> {{ registro.modelo }} </td>
                        <td> {{ registro.precio }} </td>
                        <td><button class="btn btn-secondary" type="button" @click="deleteRegistro(registro.id)">Borrar</button></td>
                        <td><button class="btn btn-info" type="button" @click="updateRegistro(registro)">Actualizar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default{
        data(){
            return{
                registros: [],
                registro:[],
                registro:{
                    id: '',
                    nombre: '',
                    modelo: '',
                    precio: ''
                },
                update: false,
                registro_id: ''
            }
        },
        created(){
            this.getRegistros();
        },
        methods: {
            getRegistros(api_url){
                api_url = api_url || '/api/registros';
                fetch(api_url)
                    .then(response=>response.json())
                    .then(response=>{
                        this.registros = response.data;
                    })
                    .catch(err=>console.log(err));
            },

            addUpdateRegistro(){                

                if(this.update===false){
                    fetch('/api/registro',{
                        method: 'post',
                        body: JSON.stringify(this.registro),
                        headers: {
                            'content-type': 'application/json'
                        }
                        })
                        .then(response=>response.json())
                        .then(data=>{
                            this.getRegistros();
                        })
                        .catch(err=>console.log(err));

                }else{
                    fetch('/api/registro/',{
                        method: 'put',
                        body: JSON.stringify(this.registro),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(response=>response.json())
                        .then(data=>{
                            this.getRegistros();
                        })
                        .catch(err=>console.log(err));
                }
                

            },
            deleteRegistro(id){
                fetch('/api/registro/' + id,{
                  method: 'delete'
                })
                    .then(response=>response.json())
                    .then(data=>{
                        this.getRegistros();
                    })
                    .catch(err=>console.log(err));

            },
            updateRegistro(registro){
                this.update =true;
                this.registro.id = registro.id;
                this.registro.registro_id = registro.id;
                this.registro.nombre = registro.nombre;
                this.registro.modelo = registro.modelo;
                this.registro.precio = registro.precio;
            }
         }
    };

    </script>


