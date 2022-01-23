<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Nova fofoca</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
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
                                <button type="submit" class="btn btn-primary">Adicionar</button>
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
    name:"add-fofoca",
    data(){
        return {
            fofoca:{
                titulo:"",
                conteudo:""
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/fofocas',this.fofoca).then(response=>{
                this.$router.push({name:"fofocaList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
