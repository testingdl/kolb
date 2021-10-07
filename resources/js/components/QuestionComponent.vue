<template>
    <div>
        <div class="col-md-12" :id="`question-container-` + question.id">
            <h1 class="h2 text-primary font-weight-bold mb-3">
                {{ getQuestionTitle }}
            </h1>
        </div>

        <div class="col-md-12 mt-2 mb-5" :id="`answer-main-container-` + question.id">
            <answers-component
                :question-id="question.id"
                :answers="question.answers" 
                @has-changed="changeHandler" 
            />
        </div>
    </div>
</template>

<script>
import AnswersComponent from './AnswersComponent';
import clone            from 'lodash/clone';
import helper           from '../mixins/helper';

export default {
    name: 'QuestionComponent',
    components: {
        AnswersComponent
    },
    mixins: [
        helper
    ],
    props: {
        question: {
            type:     Object,
            required: true
        }
    },
    computed: {
        getQuestionTitle () {
            return `${this.question.id}. ${this.question.description}`;
        }
    },
    methods: {
        changeHandler ( list ) {
            this.question.answers = clone(list);
            this.$emit('has-changed', this.question);
        },
    },
}
</script>