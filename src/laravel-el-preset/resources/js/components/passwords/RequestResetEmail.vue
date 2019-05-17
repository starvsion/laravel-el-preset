<template>
    <el-row :gutter="10">
        <el-col :span="16" :offset="4">
            <el-card class="box-card">
                <template #header class="clearfix">
                    <h3>Reset Password</h3>
                </template>
                <el-form ref="form" :model="model" :rules="rules" @submit.stop>
                    <el-form-item label="Email Address" prop="email">
                        <el-input v-model="model.email"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button icon="el-icon-d-arrow-right" type="primary" @click.native.prevent="submit">
                            Send Email Reset Link
                        </el-button>
                    </el-form-item>
                </el-form>
            </el-card>
        </el-col>
    </el-row>
</template>

<script>
    export default {
        name: "PasswordResetEmail",
        props: {
            errors: {
                type: Object,
                default: () => {
                    return {
                        email: ""
                    };
                }
            }
        },
        data: () => {
            return {
                model: {
                    email: "",
                },
                rules: {
                    email: [
                        {
                            required: true,
                            message: "Please Enter your email address",
                            trigger: "blur"
                        },
                        {
                            type: "email",
                            message: "Please enter a valid email address",
                            trigger: "blur"
                        }
                    ]
                }
            };
        },
        methods: {
            submit () {
                this.$refs.form.validate((valid) => {
                    if (valid) {
                        axios.post("/passwordResetEmail")
                            .then((response) => {
                                console.log(response);
                            })
                            .catch((error) => {

                            });
                    } else {
                        Message.error("There are errors on your form, please check");
                    }
                });
            }
        }
    };
</script>

<style scoped>

</style>