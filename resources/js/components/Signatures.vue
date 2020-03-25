<template>
    <div>
        <div v-for="(signature, idx) in signatures" :key="idx">
            <div class="card card-image"
  style="background-color:rgb(245, 241, 241);">

  <!-- Content -->
  <div class="black-text text-center align-items-center  py-5 px-4">
    <div class="rgba-white-strong pt-3 pb-3 pl-3 pr-3" style="border-radius:25px;">
      <div class="rgba-white-strong pt-3 pb-3 pl-3 pr-3" style="border-radius:25px;">

      <h1 class="display-4 card-title pt-2"><strong>
                <img :src="signature.avatar" :alt="signature.name"> <span class="glyphicon glyphicon-user" id="start"></span>
                {{ signature.name }} 's Soul</strong></h1>
                    
                <br><br>
              <h5>  {{ signature.body }}</h5>
            
                <h6><br><br>
              <blockquote><strong><i><span class="glyphicon glyphicon-calendar" id="visit"></span> {{ signature.date }} </i></strong></blockquote>
            </h6>
                <span class="glyphicon glyphicon-flag" id="comment"></span>
                <a href="#" id="comments" @click="report(signature.id)"><button type="button" class="btn btn-elegant btn-sm">Banish this Soul</button></a>
                
 </div>
    </div>
  </div>

</div>
        
    </div><paginate
                :page-count="pageCount"
                :click-handler="fetch"
                :prev-text="'PAGES ->'"
                :container-class="'pagination'">
        </paginate></div>
</template>

<script>
    export default {
        data() {
            return {
                signatures: [],
                pageCount: 1,
                endpoint: 'api/signatures?page='
            };
        },
        created() {
            this.fetch();
        },
        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.signatures = data.data;
                        this.pageCount = data.meta.last_page;
                    });
            },
            report(id) {
                if(confirm('Are you sure you want to report this signature?')) {
                    axios.put('api/signatures/'+id+'/report')
                    .then(response => this.removeSignature(id));
                }
            },
            removeSignature(id) {
                this.signatures = _.remove(this.signatures, function (signature) {
                    return signature.id !== id;
                });
            }
        }
    }
</script>