<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar fofoca</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" v-model="fofoca.titulo">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input type="text" class="form-control" v-model="fofoca.conteudo">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"update-fofoca",
    data(){
        return {
            fofoca:{
                titulo:"",
                conteudo:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showFofoca()
    },
    methods:{
        async showFofoca(){
            console.log(this.$route.params.id)
            await this.axios.get(`/api/fofocas/show/${this.$route.params.id}`).then(response=>{
                const { titulo, conteudo } = response.data
                console.log(response.data)
                this.fofoca.titulo = titulo
                this.fofoca.conteudo = conteudo
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/fofocas/${this.$route.params.id}`,this.fofoca).then(response=>{
                this.$router.push({name:"fofocaList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
