<template>
    <div>
        <div class="alert alert-danger" v-if="saved">
            <strong>Congratulations</strong> Your soul has been relinquished. 
        </div>

        <div class="well well-sm" id="signature-form">
            <form class="form-horizontal" method="post" @submit.prevent="onSubmit">
                <fieldset><div class="jumbotron">
                    
                        <label class="col-md-3 control-label" for="name">Your Worldly Name</label>
                        <div class="col-md-9" :class="{'has-error': errors.name}">
                            <input id="name"
                                   v-model="signature.name"
                                   type="text"
                                   placeholder="Your name"
                                   class="form-control">
                            <span v-if="errors.name" class="help-block text-danger">{{ errors.name[0] }}</span>
                        </div>
                    <br>

                        <label class="col-md-12 control-label" for="email">Your E-mail. Satan doesn't need it to contact you, he just wants your Gravatar to show up in his book.</label>
                        <div class="col-md-9" :class="{'has-error': errors.email}">
                            <input id="email"
                                   v-model="signature.email"
                                   type="text"
                                   placeholder="Your email"
                                   class="form-control">
                            <span v-if="errors.email" class="help-block text-danger">{{ errors.email[0] }}</span>
                        </div>
<br>
                        <label class="col-md-12 control-label" for="body">Do you have anything to confess before you sell your soul?</label>
                        <div class="col-md-10" :class="{'has-error': errors.body}">
                                    <textarea class="form-control"
                                              id="body"
                                              v-model="signature.body"
                                              placeholder="Please enter your sins here..."
                                              rows="5"></textarea>
                            <span v-if="errors.body" class="help-block text-danger">{{ errors.body[0] }}</span>
                        </div>

                    <br>
                        <div class="col-md-12 text-center">
                            <button type="submit button" class="btn btn-elegant btn-lg">Submit</button>
                        </div>
                    
                </div></fieldset>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                errors: [],
                saved: false,
                signature: {
                    name: null,
                    email: null,
                    body: null,
                }
            };
        },
        methods: {
            onSubmit() {
                this.saved = false;
                axios.post('api/signatures', this.signature)
                    .then(({data}) => this.setSuccessMessage())
                    .catch(({response}) => this.setErrors(response));
            },
            setErrors(response) {
                this.errors = response.data.errors;
            },
            setSuccessMessage() {
                this.reset();
                this.saved = true;
            },
            reset() {
                this.errors = [];
                this.signature = {name: null, email: null, body: null};
            }
        }
    }
</script>