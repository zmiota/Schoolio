package pl.wsb.projekt.grade.dto;

public class CreateGradeRequest {
    private Integer value;
    private Integer weight;
    private String comment;
    private Long studentId;
    private Long subjectId;

    public CreateGradeRequest() {
    }

    public CreateGradeRequest(Integer value, Integer weight, String comment, Long studentId, Long subjectId) {
        this.value = value;
        this.weight = weight;
        this.comment = comment;
        this.studentId = studentId;
        this.subjectId = subjectId;
    }

    public Integer getValue() {
        return value;
    }

    public void setValue(Integer value) {
        this.value = value;
    }

    public Integer getWeight() {
        return weight;
    }

    public void setWeight(Integer weight) {
        this.weight = weight;
    }

    public String getComment() {
        return comment;
    }

    public void setComment(String comment) {
        this.comment = comment;
    }

    public Long getStudentId() {
        return studentId;
    }

    public void setStudentId(Long studentId) {
        this.studentId = studentId;
    }

    public Long getSubjectId() {
        return subjectId;
    }

    public void setSubjectId(Long subjectId) {
        this.subjectId = subjectId;
    }
}