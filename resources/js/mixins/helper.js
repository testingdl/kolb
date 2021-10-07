export default {
    methods: {
        reverseAnswers (answers) {
            const ret = new Array;
            for(let i = answers.length - 1; i >= 0; i--) {
                ret.push(answers[i]);
            }
            return ret;
        },
    }
}