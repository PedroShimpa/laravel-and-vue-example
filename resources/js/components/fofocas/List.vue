<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"fofocaAdd"}' class="btn btn-primary">NOVA FOFOCA</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Fofoca</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody v-if="fofocas.length > 0">
                                <tr v-for="(fofoca,key) in fofocas" :key="key">
                                    <td>{{ fofoca.id }}</td>
                                    <td>{{ fofoca.titulo }}</td>
                                    <td>{{ fofoca.conteudo }}</td>
                                    <td>
                                        <router-link :to='{name:"fofocasEdit",params:{id:fofoca.id}}' class="btn btn-success">Editar</router-link>
                                        <button type="button" @click="deleteFofoca(fofoca.id)" class="btn btn-danger">Deletar</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">Nínguem fofocou nada ainda...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"fofocas",
    data(){
        return {
            fofocas:[]
        }
    },
    mounted(){
        this.getFofocas()
    },
    methods:{
        async getFofocas(){
            await this.axios.get('/api/fofocas').then(response=>{
                this.fofocas = response.data
            }).catch(error=>{
                console.log(error)
                this.fofocas = []
            })
        },
        deleteFofoca(id){
            if(confirm("Deseja mesmo deletar esta fofoca?")){
                this.axios.delete(`/api/fofocas/${id}`).then(response=>{
                    this.getFofocas()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
