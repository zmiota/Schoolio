package pl.wsb.projekt.grade.controller;

import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.*;
import pl.wsb.projekt.grade.domain.Grade;
import pl.wsb.projekt.grade.dto.CreateGradeRequest;
import pl.wsb.projekt.grade.service.GradeService;

import java.util.List;

@RestController
@RequestMapping("/api/grades")
public class GradeController {

    private final GradeService gradeService;

    public GradeController(GradeService gradeService) {
        this.gradeService = gradeService;
    }

    @GetMapping
    public List<Grade> getAllGrades() {
        return gradeService.getAllGrades();
    }

    @GetMapping("/student/{studentId}")
    public List<Grade> getGradesByStudent(@PathVariable Long studentId) {
        return gradeService.getGradesForStudent(studentId);
    }

    @PostMapping
    @ResponseStatus(HttpStatus.CREATED)
    public Grade addGrade(@RequestBody CreateGradeRequest request) {
        return gradeService.createGrade(request);
    }
}