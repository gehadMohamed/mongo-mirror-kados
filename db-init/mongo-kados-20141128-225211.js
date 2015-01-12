
/** framework_languages indexes **/
db.getCollection("framework_languages").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_menus indexes **/
db.getCollection("framework_menus").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_menus_translations indexes **/
db.getCollection("framework_menus_translations").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_parameters indexes **/
db.getCollection("framework_parameters").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_parameters_translations indexes **/
db.getCollection("framework_parameters_translations").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_profiles indexes **/
db.getCollection("framework_profiles").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_profiles_actions indexes **/
db.getCollection("framework_profiles_actions").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_profiles_actions_translations indexes **/
db.getCollection("framework_profiles_actions_translations").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_profiles_constitution_actions indexes **/
db.getCollection("framework_profiles_constitution_actions").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_profiles_constitution_menus indexes **/
db.getCollection("framework_profiles_constitution_menus").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_status indexes **/
db.getCollection("framework_status").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_status_translations indexes **/
db.getCollection("framework_status_translations").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_users indexes **/
db.getCollection("framework_users").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_workflows indexes **/
db.getCollection("framework_workflows").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_workflows_transitions indexes **/
db.getCollection("framework_workflows_transitions").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_workflows_transitions_profiles indexes **/
db.getCollection("framework_workflows_transitions_profiles").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_workflows_translations indexes **/
db.getCollection("framework_workflows_translations").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_actions indexes **/
db.getCollection("kados_actions").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_activities indexes **/
db.getCollection("kados_activities").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_baselines indexes **/
db.getCollection("kados_baselines").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_colors indexes **/
db.getCollection("kados_colors").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_colors_uses indexes **/
db.getCollection("kados_colors_uses").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_connections indexes **/
db.getCollection("kados_connections").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_features indexes **/
db.getCollection("kados_features").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_issues indexes **/
db.getCollection("kados_issues").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_projects indexes **/
db.getCollection("kados_projects").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_projects_colors indexes **/
db.getCollection("kados_projects_colors").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_projects_columns indexes **/
db.getCollection("kados_projects_columns").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_projects_idle_days indexes **/
db.getCollection("kados_projects_idle_days").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_projects_settings indexes **/
db.getCollection("kados_projects_settings").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_projects_users indexes **/
db.getCollection("kados_projects_users").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_releases indexes **/
db.getCollection("kados_releases").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_sprints indexes **/
db.getCollection("kados_sprints").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_sprints_progress indexes **/
db.getCollection("kados_sprints_progress").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_tags indexes **/
db.getCollection("kados_tags").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_tags_postit indexes **/
db.getCollection("kados_tags_postit").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_tags_projects indexes **/
db.getCollection("kados_tags_projects").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_tasks indexes **/
db.getCollection("kados_tasks").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_template_activities indexes **/
db.getCollection("kados_template_activities").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_template_columns indexes **/
db.getCollection("kados_template_columns").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_user_stories indexes **/
db.getCollection("kados_user_stories").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_users_bookmarks indexes **/
db.getCollection("kados_users_bookmarks").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** kados_users_decks indexes **/
db.getCollection("kados_users_decks").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** framework_languages records **/
db.getCollection("framework_languages").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4567"),
  "language_tag": "br",
  "language_name": "portugu"
});
db.getCollection("framework_languages").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4568"),
  "language_tag": "de",
  "language_name": "Deutsch"
});
db.getCollection("framework_languages").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4569"),
  "language_tag": "en",
  "language_name": "English"
});
db.getCollection("framework_languages").insert({
  "_id": ObjectId("5463b245f05ef7e0188b456a"),
  "language_tag": "es",
  "language_name": "Espa"
});
db.getCollection("framework_languages").insert({
  "_id": ObjectId("5463b245f05ef7e0188b456b"),
  "language_tag": "fr",
  "language_name": "Fran"
});
db.getCollection("framework_languages").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4567"),
  "language_tag": "br",
  "language_name": "portugu"
});
db.getCollection("framework_languages").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4568"),
  "language_tag": "de",
  "language_name": "Deutsch"
});
db.getCollection("framework_languages").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4569"),
  "language_tag": "en",
  "language_name": "English"
});
db.getCollection("framework_languages").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b456a"),
  "language_tag": "es",
  "language_name": "Espa"
});
db.getCollection("framework_languages").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b456b"),
  "language_tag": "fr",
  "language_name": "Fran"
});

/** framework_menus records **/
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4573"),
  "menu_default": "0",
  "menu_father": "app_admin",
  "menu_file": "app_admin/template_tags.php?",
  "menu_order": "8",
  "menu_tag": "app_tags",
  "menu_translation_language": "en",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b457a"),
  "menu_default": "1",
  "menu_father": "app_admin",
  "menu_file": "app_admin/external_connections.php?",
  "menu_order": "1",
  "menu_tag": "connections",
  "menu_translation_language": "en",
  "menu_translation_value": "Connections"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b457d"),
  "menu_default": "0",
  "menu_father": "",
  "menu_file": "administration/languages.php?",
  "menu_order": "102",
  "menu_tag": "languages",
  "menu_translation_language": "en",
  "menu_translation_value": "Languages"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4580"),
  "menu_default": "1",
  "menu_father": "settings",
  "menu_file": "project_postit_colors.php?",
  "menu_order": "1",
  "menu_tag": "prj_colors",
  "menu_translation_language": "en",
  "menu_translation_value": "Colors"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4581"),
  "menu_default": "0",
  "menu_father": "settings",
  "menu_file": "project_columns.php?",
  "menu_order": "3",
  "menu_tag": "prj_columns",
  "menu_translation_language": "en",
  "menu_translation_value": "Tasks columns"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b456f"),
  "menu_default": "1",
  "menu_father": "admin",
  "menu_file": "administration/users.php?",
  "menu_order": "1",
  "menu_tag": "admin_user",
  "menu_translation_language": "en",
  "menu_translation_value": "Users"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4575"),
  "menu_default": "0",
  "menu_father": "",
  "menu_file": "project_us_review.php?",
  "menu_order": "6",
  "menu_tag": "ceremony",
  "menu_translation_language": "en",
  "menu_translation_value": "US priority"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4576"),
  "menu_default": null,
  "menu_father": "cockpit",
  "menu_file": "manage_release_checklist.php?",
  "menu_order": "2",
  "menu_tag": "checklist",
  "menu_translation_language": "en",
  "menu_translation_value": "Checklist"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4577"),
  "menu_default": "0",
  "menu_father": "",
  "menu_file": "project_cockpit.php?",
  "menu_order": "2",
  "menu_tag": "cockpit",
  "menu_translation_language": "en",
  "menu_translation_value": "Project cockpit"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4579"),
  "menu_default": "0",
  "menu_father": "app_admin",
  "menu_file": "app_admin/colors.php?",
  "menu_order": "2",
  "menu_tag": "colors",
  "menu_translation_language": "en",
  "menu_translation_value": "Colors"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b457c"),
  "menu_default": "0",
  "menu_father": "",
  "menu_file": "project_issues_impact.php?",
  "menu_order": "7",
  "menu_tag": "issues",
  "menu_translation_language": "en",
  "menu_translation_value": "Issues"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b457e"),
  "menu_default": "0",
  "menu_father": "",
  "menu_file": "my_profile.php?",
  "menu_order": "101",
  "menu_tag": "my_profile",
  "menu_translation_language": "en",
  "menu_translation_value": "My profile"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4582"),
  "menu_default": "0",
  "menu_father": "",
  "menu_file": "project_features.php?",
  "menu_order": "3",
  "menu_tag": "prj_feature",
  "menu_translation_language": "en",
  "menu_translation_value": "Features"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4572"),
  "menu_tag": "app_prj_templates",
  "menu_file": "app_admin/templates_project.php?",
  "menu_father": "app_admin",
  "menu_order": "7",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4573"),
  "menu_tag": "app_tags",
  "menu_file": "app_admin/template_tags.php?",
  "menu_father": "app_admin",
  "menu_order": "8",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4574"),
  "menu_tag": "app_tpl_checklist",
  "menu_file": "template_checklist.php?",
  "menu_father": "app_admin",
  "menu_order": "5",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4575"),
  "menu_tag": "ceremony",
  "menu_file": "project_us_review.php?",
  "menu_father": "",
  "menu_order": "6",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4576"),
  "menu_tag": "checklist",
  "menu_file": "manage_release_checklist.php?",
  "menu_father": "cockpit",
  "menu_order": "2",
  "menu_default": null
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4577"),
  "menu_tag": "cockpit",
  "menu_file": "project_cockpit.php?",
  "menu_father": "",
  "menu_order": "2",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4578"),
  "menu_tag": "color_uses",
  "menu_file": "app_admin/colors_uses.php?",
  "menu_father": "app_admin",
  "menu_order": "3",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4579"),
  "menu_tag": "colors",
  "menu_file": "app_admin/colors.php?",
  "menu_father": "app_admin",
  "menu_order": "2",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b457c"),
  "menu_tag": "issues",
  "menu_file": "project_issues_impact.php?",
  "menu_father": "",
  "menu_order": "7",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b457d"),
  "menu_tag": "languages",
  "menu_file": "administration/languages.php?",
  "menu_father": "",
  "menu_order": "102",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b457e"),
  "menu_tag": "my_profile",
  "menu_file": "my_profile.php?",
  "menu_father": "",
  "menu_order": "101",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4580"),
  "menu_tag": "prj_colors",
  "menu_file": "project_postit_colors.php?",
  "menu_father": "settings",
  "menu_order": "1",
  "menu_default": "1"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4581"),
  "menu_tag": "prj_columns",
  "menu_file": "project_columns.php?",
  "menu_father": "settings",
  "menu_order": "3",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4582"),
  "menu_tag": "prj_feature",
  "menu_file": "project_features.php?",
  "menu_father": "",
  "menu_order": "3",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4583"),
  "menu_tag": "prj_issues_impact",
  "menu_file": "project_issues_impact.php?",
  "menu_father": "issues",
  "menu_order": "1",
  "menu_default": "1"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4584"),
  "menu_tag": "prj_issues_progress",
  "menu_file": "project_issues_progress.php?",
  "menu_father": "issues",
  "menu_order": "2",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4585"),
  "menu_tag": "prj_kanban",
  "menu_file": "manage_kanban.php?",
  "menu_father": "cockpit",
  "menu_order": "1",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4586"),
  "menu_tag": "prj_parameters",
  "menu_file": "project_parameters.php?",
  "menu_father": "settings",
  "menu_order": "4",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4587"),
  "menu_tag": "prj_report",
  "menu_file": "project_reports.php?",
  "menu_father": "cockpit",
  "menu_order": "4",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4588"),
  "menu_tag": "prj_settings",
  "menu_file": "project_settings.php?",
  "menu_father": "settings",
  "menu_order": "2",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4589"),
  "menu_tag": "prj_tags",
  "menu_file": "project_tags.php?",
  "menu_father": "settings",
  "menu_order": "6",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b458a"),
  "menu_tag": "projects",
  "menu_file": "projects.php?",
  "menu_father": "",
  "menu_order": "1",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b458b"),
  "menu_tag": "settings",
  "menu_file": "project_postit_colors.php?",
  "menu_father": "",
  "menu_order": "8",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b458c"),
  "menu_tag": "team",
  "menu_file": "project_team.php?",
  "menu_father": "",
  "menu_order": "3",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b458d"),
  "menu_tag": "team_tasks",
  "menu_file": "project_team_tasks.php?",
  "menu_father": "team",
  "menu_order": "1",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b458e"),
  "menu_tag": "trash_action",
  "menu_file": "trash_actions.php?",
  "menu_father": "issues",
  "menu_order": "6",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b458f"),
  "menu_tag": "trash_issue",
  "menu_file": "trash_issues.php?",
  "menu_father": "issues",
  "menu_order": "4",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4590"),
  "menu_tag": "trash_tsk",
  "menu_file": "trash_tasks.php?",
  "menu_father": "cockpit",
  "menu_order": "7",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4591"),
  "menu_tag": "trash_us",
  "menu_file": "trash_us.php?",
  "menu_father": "cockpit",
  "menu_order": "6",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4592"),
  "menu_tag": "us_review",
  "menu_file": "project_us_review.php?",
  "menu_father": "ceremony",
  "menu_order": "1",
  "menu_default": "1"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4593"),
  "menu_tag": "us_roadmap",
  "menu_file": "project_us_roadmap.php?",
  "menu_father": "cockpit",
  "menu_order": "3",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4587"),
  "menu_default": "0",
  "menu_father": "cockpit",
  "menu_file": "project_reports.php?",
  "menu_order": "4",
  "menu_tag": "prj_report",
  "menu_translation_language": "en",
  "menu_translation_value": "Reports"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b458a"),
  "menu_default": "0",
  "menu_father": "",
  "menu_file": "projects.php?",
  "menu_order": "1",
  "menu_tag": "projects",
  "menu_translation_language": "en",
  "menu_translation_value": "Portfolio"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b458c"),
  "menu_default": "0",
  "menu_father": "",
  "menu_file": "project_team.php?",
  "menu_order": "3",
  "menu_tag": "team",
  "menu_translation_language": "en",
  "menu_translation_value": "Team"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b458d"),
  "menu_default": "0",
  "menu_father": "team",
  "menu_file": "project_team_tasks.php?",
  "menu_order": "1",
  "menu_tag": "team_tasks",
  "menu_translation_language": "en",
  "menu_translation_value": "Team tasks"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b458e"),
  "menu_default": "0",
  "menu_father": "issues",
  "menu_file": "trash_actions.php?",
  "menu_order": "6",
  "menu_tag": "trash_action",
  "menu_translation_language": "en",
  "menu_translation_value": "Actions trash"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4591"),
  "menu_default": "0",
  "menu_father": "cockpit",
  "menu_file": "trash_us.php?",
  "menu_order": "6",
  "menu_tag": "trash_us",
  "menu_translation_language": "en",
  "menu_translation_value": "US trash"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4593"),
  "menu_default": "0",
  "menu_father": "cockpit",
  "menu_file": "project_us_roadmap.php?",
  "menu_order": "3",
  "menu_tag": "us_roadmap",
  "menu_translation_language": "en",
  "menu_translation_value": "US roadmap"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b456c"),
  "menu_default": "0",
  "menu_father": "",
  "menu_file": "administration/users.php?",
  "menu_order": "100",
  "menu_tag": "admin",
  "menu_translation_language": "en",
  "menu_translation_value": "Administration"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b456d"),
  "menu_default": "0",
  "menu_father": "admin",
  "menu_file": "administration/parameters.php?",
  "menu_order": "3",
  "menu_tag": "admin_param",
  "menu_translation_language": "en",
  "menu_translation_value": "Settings"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b456e"),
  "menu_default": "0",
  "menu_father": "admin",
  "menu_file": "administration/profiles.php?",
  "menu_order": "2",
  "menu_tag": "admin_profile",
  "menu_translation_language": "en",
  "menu_translation_value": "Profiles"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4570"),
  "menu_default": "0",
  "menu_father": "",
  "menu_file": "app_admin/external_connections.php?",
  "menu_order": "52",
  "menu_tag": "app_admin",
  "menu_translation_language": "en",
  "menu_translation_value": "Global settings"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4571"),
  "menu_default": "0",
  "menu_father": "app_admin",
  "menu_file": "app_admin/app_columns.php?",
  "menu_order": "4",
  "menu_tag": "app_columns",
  "menu_translation_language": "en",
  "menu_translation_value": "Columns template"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4572"),
  "menu_default": "0",
  "menu_father": "app_admin",
  "menu_file": "app_admin/templates_project.php?",
  "menu_order": "7",
  "menu_tag": "app_prj_templates",
  "menu_translation_language": "en",
  "menu_translation_value": "Projects templates"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4574"),
  "menu_default": "0",
  "menu_father": "app_admin",
  "menu_file": "template_checklist.php?",
  "menu_order": "5",
  "menu_tag": "app_tpl_checklist",
  "menu_translation_language": "en",
  "menu_translation_value": "Checklist template"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4578"),
  "menu_default": "0",
  "menu_father": "app_admin",
  "menu_file": "app_admin/colors_uses.php?",
  "menu_order": "3",
  "menu_tag": "color_uses",
  "menu_translation_language": "en",
  "menu_translation_value": "Colors uses"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b457b"),
  "menu_default": "0",
  "menu_father": "issues",
  "menu_file": "project_issues_history.php?",
  "menu_order": "3",
  "menu_tag": "issue_history",
  "menu_translation_language": "en",
  "menu_translation_value": "History"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b457f"),
  "menu_default": "0",
  "menu_father": "ceremony",
  "menu_file": "project_poker_planning.php?",
  "menu_order": "2",
  "menu_tag": "poker_plan",
  "menu_translation_language": "en",
  "menu_translation_value": "Complexity"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4583"),
  "menu_default": "1",
  "menu_father": "issues",
  "menu_file": "project_issues_impact.php?",
  "menu_order": "1",
  "menu_tag": "prj_issues_impact",
  "menu_translation_language": "en",
  "menu_translation_value": "Assessment"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4584"),
  "menu_default": "0",
  "menu_father": "issues",
  "menu_file": "project_issues_progress.php?",
  "menu_order": "2",
  "menu_tag": "prj_issues_progress",
  "menu_translation_language": "en",
  "menu_translation_value": "Actions progress"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4585"),
  "menu_default": "0",
  "menu_father": "cockpit",
  "menu_file": "manage_kanban.php?",
  "menu_order": "1",
  "menu_tag": "prj_kanban",
  "menu_translation_language": "en",
  "menu_translation_value": "Dashboard"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4586"),
  "menu_default": "0",
  "menu_father": "settings",
  "menu_file": "project_parameters.php?",
  "menu_order": "4",
  "menu_tag": "prj_parameters",
  "menu_translation_language": "en",
  "menu_translation_value": "Parameters"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4588"),
  "menu_default": "0",
  "menu_father": "settings",
  "menu_file": "project_settings.php?",
  "menu_order": "2",
  "menu_tag": "prj_settings",
  "menu_translation_language": "en",
  "menu_translation_value": "Attributes values"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4589"),
  "menu_default": "0",
  "menu_father": "settings",
  "menu_file": "project_tags.php?",
  "menu_order": "6",
  "menu_tag": "prj_tags",
  "menu_translation_language": "en",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b458b"),
  "menu_default": "0",
  "menu_father": "",
  "menu_file": "project_postit_colors.php?",
  "menu_order": "8",
  "menu_tag": "settings",
  "menu_translation_language": "en",
  "menu_translation_value": "Project configuration"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b458f"),
  "menu_default": "0",
  "menu_father": "issues",
  "menu_file": "trash_issues.php?",
  "menu_order": "4",
  "menu_tag": "trash_issue",
  "menu_translation_language": "en",
  "menu_translation_value": "Issues trash"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4590"),
  "menu_default": "0",
  "menu_father": "cockpit",
  "menu_file": "trash_tasks.php?",
  "menu_order": "7",
  "menu_tag": "trash_tsk",
  "menu_translation_language": "en",
  "menu_translation_value": "Tasks trash"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4592"),
  "menu_default": "1",
  "menu_father": "ceremony",
  "menu_file": "project_us_review.php?",
  "menu_order": "1",
  "menu_tag": "us_review",
  "menu_translation_language": "en",
  "menu_translation_value": "Business Value"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b456c"),
  "menu_tag": "admin",
  "menu_file": "administration/users.php?",
  "menu_father": "",
  "menu_order": "100",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b456d"),
  "menu_tag": "admin_param",
  "menu_file": "administration/parameters.php?",
  "menu_father": "admin",
  "menu_order": "3",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b456e"),
  "menu_tag": "admin_profile",
  "menu_file": "administration/profiles.php?",
  "menu_father": "admin",
  "menu_order": "2",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b456f"),
  "menu_tag": "admin_user",
  "menu_file": "administration/users.php?",
  "menu_father": "admin",
  "menu_order": "1",
  "menu_default": "1"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4570"),
  "menu_tag": "app_admin",
  "menu_file": "app_admin/external_connections.php?",
  "menu_father": "",
  "menu_order": "52",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4571"),
  "menu_tag": "app_columns",
  "menu_file": "app_admin/app_columns.php?",
  "menu_father": "app_admin",
  "menu_order": "4",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b457a"),
  "menu_tag": "connections",
  "menu_file": "app_admin/external_connections.php?",
  "menu_father": "app_admin",
  "menu_order": "1",
  "menu_default": "1"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b457b"),
  "menu_tag": "issue_history",
  "menu_file": "project_issues_history.php?",
  "menu_father": "issues",
  "menu_order": "3",
  "menu_default": "0"
});
db.getCollection("framework_menus").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b457f"),
  "menu_tag": "poker_plan",
  "menu_file": "project_poker_planning.php?",
  "menu_father": "ceremony",
  "menu_order": "2",
  "menu_default": "0"
});

/** framework_menus_translations records **/
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4594"),
  "menu_tag_fk": "admin",
  "menu_translation_language": "br",
  "menu_translation_value": "Administra"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4595"),
  "menu_tag_fk": "admin",
  "menu_translation_language": "de",
  "menu_translation_value": "Verwaltung"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4596"),
  "menu_tag_fk": "admin",
  "menu_translation_language": "en",
  "menu_translation_value": "Administration"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4597"),
  "menu_tag_fk": "admin",
  "menu_translation_language": "es",
  "menu_translation_value": "Administraci"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4598"),
  "menu_tag_fk": "admin",
  "menu_translation_language": "fr",
  "menu_translation_value": "Administration"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4599"),
  "menu_tag_fk": "admin_param",
  "menu_translation_language": "br",
  "menu_translation_value": "Configura"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b459a"),
  "menu_tag_fk": "admin_param",
  "menu_translation_language": "de",
  "menu_translation_value": "Einstellungen"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b459b"),
  "menu_tag_fk": "admin_param",
  "menu_translation_language": "en",
  "menu_translation_value": "Settings"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b459c"),
  "menu_tag_fk": "admin_param",
  "menu_translation_language": "es",
  "menu_translation_value": "Configuraci"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b459d"),
  "menu_tag_fk": "admin_param",
  "menu_translation_language": "fr",
  "menu_translation_value": "Param"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b459e"),
  "menu_tag_fk": "admin_profile",
  "menu_translation_language": "br",
  "menu_translation_value": "Perfis"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b459f"),
  "menu_tag_fk": "admin_profile",
  "menu_translation_language": "de",
  "menu_translation_value": "Profile"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45a0"),
  "menu_tag_fk": "admin_profile",
  "menu_translation_language": "en",
  "menu_translation_value": "Profiles"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45a1"),
  "menu_tag_fk": "admin_profile",
  "menu_translation_language": "es",
  "menu_translation_value": "Perfiles"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45a2"),
  "menu_tag_fk": "admin_profile",
  "menu_translation_language": "fr",
  "menu_translation_value": "Profils"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45a3"),
  "menu_tag_fk": "admin_user",
  "menu_translation_language": "br",
  "menu_translation_value": "Usu"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45a4"),
  "menu_tag_fk": "admin_user",
  "menu_translation_language": "de",
  "menu_translation_value": "Benutzer"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45a5"),
  "menu_tag_fk": "admin_user",
  "menu_translation_language": "en",
  "menu_translation_value": "Users"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45a6"),
  "menu_tag_fk": "admin_user",
  "menu_translation_language": "es",
  "menu_translation_value": "Usuarios"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45a7"),
  "menu_tag_fk": "admin_user",
  "menu_translation_language": "fr",
  "menu_translation_value": "Utilisateurs"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45a8"),
  "menu_tag_fk": "app_admin",
  "menu_translation_language": "br",
  "menu_translation_value": "Configura"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45a9"),
  "menu_tag_fk": "app_admin",
  "menu_translation_language": "de",
  "menu_translation_value": "Globale Einstellungen"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45aa"),
  "menu_tag_fk": "app_admin",
  "menu_translation_language": "en",
  "menu_translation_value": "Global settings"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ab"),
  "menu_tag_fk": "app_admin",
  "menu_translation_language": "es",
  "menu_translation_value": "Configuracion general"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ac"),
  "menu_tag_fk": "app_admin",
  "menu_translation_language": "fr",
  "menu_translation_value": "Param"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ad"),
  "menu_tag_fk": "app_columns",
  "menu_translation_language": "br",
  "menu_translation_value": "Templates de colunas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ae"),
  "menu_tag_fk": "app_columns",
  "menu_translation_language": "de",
  "menu_translation_value": "Spaltenvorlage"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45af"),
  "menu_tag_fk": "app_columns",
  "menu_translation_language": "en",
  "menu_translation_value": "Columns template"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45b0"),
  "menu_tag_fk": "app_columns",
  "menu_translation_language": "es",
  "menu_translation_value": "Modelo de columnas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45b1"),
  "menu_tag_fk": "app_columns",
  "menu_translation_language": "fr",
  "menu_translation_value": "Mod"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45b2"),
  "menu_tag_fk": "app_prj_templates",
  "menu_translation_language": "br",
  "menu_translation_value": "Templates de projetos"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45b3"),
  "menu_tag_fk": "app_prj_templates",
  "menu_translation_language": "de",
  "menu_translation_value": "Projektvorlage"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45b4"),
  "menu_tag_fk": "app_prj_templates",
  "menu_translation_language": "en",
  "menu_translation_value": "Projects templates"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45b5"),
  "menu_tag_fk": "app_prj_templates",
  "menu_translation_language": "es",
  "menu_translation_value": "Modelo de proyectos"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45b6"),
  "menu_tag_fk": "app_prj_templates",
  "menu_translation_language": "fr",
  "menu_translation_value": "Mod"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45b7"),
  "menu_tag_fk": "app_tags",
  "menu_translation_language": "br",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45b8"),
  "menu_tag_fk": "app_tags",
  "menu_translation_language": "de",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45b9"),
  "menu_tag_fk": "app_tags",
  "menu_translation_language": "en",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ba"),
  "menu_tag_fk": "app_tags",
  "menu_translation_language": "es",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45bb"),
  "menu_tag_fk": "app_tags",
  "menu_translation_language": "fr",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45bc"),
  "menu_tag_fk": "app_tpl_checklist",
  "menu_translation_language": "br",
  "menu_translation_value": "Template de checklist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45bd"),
  "menu_tag_fk": "app_tpl_checklist",
  "menu_translation_language": "de",
  "menu_translation_value": "Vorlage f"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45be"),
  "menu_tag_fk": "app_tpl_checklist",
  "menu_translation_language": "en",
  "menu_translation_value": "Checklist template"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45bf"),
  "menu_tag_fk": "app_tpl_checklist",
  "menu_translation_language": "es",
  "menu_translation_value": "Modelo de la checklist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45c0"),
  "menu_tag_fk": "app_tpl_checklist",
  "menu_translation_language": "fr",
  "menu_translation_value": "Mod"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45c1"),
  "menu_tag_fk": "ceremony",
  "menu_translation_language": "br",
  "menu_translation_value": "US de prioriza"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45c2"),
  "menu_tag_fk": "ceremony",
  "menu_translation_language": "de",
  "menu_translation_value": "US Priorit"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45c3"),
  "menu_tag_fk": "ceremony",
  "menu_translation_language": "en",
  "menu_translation_value": "US priority"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45c4"),
  "menu_tag_fk": "ceremony",
  "menu_translation_language": "es",
  "menu_translation_value": "US de priorizaci"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45c5"),
  "menu_tag_fk": "ceremony",
  "menu_translation_language": "fr",
  "menu_translation_value": "Priorit"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45c6"),
  "menu_tag_fk": "checklist",
  "menu_translation_language": "br",
  "menu_translation_value": "Checklist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45c7"),
  "menu_tag_fk": "checklist",
  "menu_translation_language": "de",
  "menu_translation_value": "Checklisten"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45c8"),
  "menu_tag_fk": "checklist",
  "menu_translation_language": "en",
  "menu_translation_value": "Checklist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45c9"),
  "menu_tag_fk": "checklist",
  "menu_translation_language": "es",
  "menu_translation_value": "Checklist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ca"),
  "menu_tag_fk": "checklist",
  "menu_translation_language": "fr",
  "menu_translation_value": "Checklist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45cb"),
  "menu_tag_fk": "cockpit",
  "menu_translation_language": "br",
  "menu_translation_value": "Cockpit do projeto"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45cc"),
  "menu_tag_fk": "cockpit",
  "menu_translation_language": "de",
  "menu_translation_value": "Projekt"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45cd"),
  "menu_tag_fk": "cockpit",
  "menu_translation_language": "en",
  "menu_translation_value": "Project cockpit"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ce"),
  "menu_tag_fk": "cockpit",
  "menu_translation_language": "es",
  "menu_translation_value": "Proyecto piloto"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45cf"),
  "menu_tag_fk": "cockpit",
  "menu_translation_language": "fr",
  "menu_translation_value": "Cockpit projet"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45d0"),
  "menu_tag_fk": "color_uses",
  "menu_translation_language": "br",
  "menu_translation_value": "Utiliza"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45d1"),
  "menu_tag_fk": "color_uses",
  "menu_translation_language": "de",
  "menu_translation_value": "Farbzuordnung"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45d2"),
  "menu_tag_fk": "color_uses",
  "menu_translation_language": "en",
  "menu_translation_value": "Colors uses"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45d3"),
  "menu_tag_fk": "color_uses",
  "menu_translation_language": "es",
  "menu_translation_value": "Asignaci"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45d4"),
  "menu_tag_fk": "color_uses",
  "menu_translation_language": "fr",
  "menu_translation_value": "Affectation des couleurs"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45d5"),
  "menu_tag_fk": "colors",
  "menu_translation_language": "br",
  "menu_translation_value": "Cores das notas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45d6"),
  "menu_tag_fk": "colors",
  "menu_translation_language": "de",
  "menu_translation_value": "Farben"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45d7"),
  "menu_tag_fk": "colors",
  "menu_translation_language": "en",
  "menu_translation_value": "Colors"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45d8"),
  "menu_tag_fk": "colors",
  "menu_translation_language": "es",
  "menu_translation_value": "Colores"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45d9"),
  "menu_tag_fk": "colors",
  "menu_translation_language": "fr",
  "menu_translation_value": "Couleurs"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45da"),
  "menu_tag_fk": "connections",
  "menu_translation_language": "br",
  "menu_translation_value": "Conex"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45db"),
  "menu_tag_fk": "connections",
  "menu_translation_language": "de",
  "menu_translation_value": "Verbindungen"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45dc"),
  "menu_tag_fk": "connections",
  "menu_translation_language": "en",
  "menu_translation_value": "Connections"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45dd"),
  "menu_tag_fk": "connections",
  "menu_translation_language": "es",
  "menu_translation_value": "Conexiones"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45de"),
  "menu_tag_fk": "connections",
  "menu_translation_language": "fr",
  "menu_translation_value": "Connexions"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45df"),
  "menu_tag_fk": "issue_history",
  "menu_translation_language": "br",
  "menu_translation_value": "Hist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45e0"),
  "menu_tag_fk": "issue_history",
  "menu_translation_language": "de",
  "menu_translation_value": "Historie"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45e1"),
  "menu_tag_fk": "issue_history",
  "menu_translation_language": "en",
  "menu_translation_value": "History"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45e2"),
  "menu_tag_fk": "issue_history",
  "menu_translation_language": "es",
  "menu_translation_value": "Historial"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45e3"),
  "menu_tag_fk": "issue_history",
  "menu_translation_language": "fr",
  "menu_translation_value": "Historique"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45e4"),
  "menu_tag_fk": "issues",
  "menu_translation_language": "br",
  "menu_translation_value": "Problemas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45e5"),
  "menu_tag_fk": "issues",
  "menu_translation_language": "de",
  "menu_translation_value": "Vorf"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45e6"),
  "menu_tag_fk": "issues",
  "menu_translation_language": "en",
  "menu_translation_value": "Issues"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45e7"),
  "menu_tag_fk": "issues",
  "menu_translation_language": "es",
  "menu_translation_value": "Errores"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45e8"),
  "menu_tag_fk": "issues",
  "menu_translation_language": "fr",
  "menu_translation_value": "RADAR"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45e9"),
  "menu_tag_fk": "languages",
  "menu_translation_language": "br",
  "menu_translation_value": "Idiomas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ea"),
  "menu_tag_fk": "languages",
  "menu_translation_language": "de",
  "menu_translation_value": "Sprachen"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45eb"),
  "menu_tag_fk": "languages",
  "menu_translation_language": "en",
  "menu_translation_value": "Languages"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ec"),
  "menu_tag_fk": "languages",
  "menu_translation_language": "es",
  "menu_translation_value": "Idiomas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ed"),
  "menu_tag_fk": "languages",
  "menu_translation_language": "fr",
  "menu_translation_value": "Langues"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ee"),
  "menu_tag_fk": "my_profile",
  "menu_translation_language": "br",
  "menu_translation_value": "Meu perfil"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ef"),
  "menu_tag_fk": "my_profile",
  "menu_translation_language": "de",
  "menu_translation_value": "Mein Profil"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45f0"),
  "menu_tag_fk": "my_profile",
  "menu_translation_language": "en",
  "menu_translation_value": "My profile"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45f1"),
  "menu_tag_fk": "my_profile",
  "menu_translation_language": "es",
  "menu_translation_value": "Mi perfil"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45f2"),
  "menu_tag_fk": "my_profile",
  "menu_translation_language": "fr",
  "menu_translation_value": "Mon profil"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45f3"),
  "menu_tag_fk": "poker_plan",
  "menu_translation_language": "br",
  "menu_translation_value": "Complexidade"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45f4"),
  "menu_tag_fk": "poker_plan",
  "menu_translation_language": "de",
  "menu_translation_value": "Komplexit"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45f5"),
  "menu_tag_fk": "poker_plan",
  "menu_translation_language": "en",
  "menu_translation_value": "Complexity"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45f6"),
  "menu_tag_fk": "poker_plan",
  "menu_translation_language": "es",
  "menu_translation_value": "Complejidad"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45f7"),
  "menu_tag_fk": "poker_plan",
  "menu_translation_language": "fr",
  "menu_translation_value": "Complexit"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45f8"),
  "menu_tag_fk": "prj_colors",
  "menu_translation_language": "br",
  "menu_translation_value": "Cores"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45f9"),
  "menu_tag_fk": "prj_colors",
  "menu_translation_language": "de",
  "menu_translation_value": "Farben"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45fa"),
  "menu_tag_fk": "prj_colors",
  "menu_translation_language": "en",
  "menu_translation_value": "Colors"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45fb"),
  "menu_tag_fk": "prj_colors",
  "menu_translation_language": "es",
  "menu_translation_value": "Colores"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45fc"),
  "menu_tag_fk": "prj_colors",
  "menu_translation_language": "fr",
  "menu_translation_value": "Couleurs"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45fd"),
  "menu_tag_fk": "prj_columns",
  "menu_translation_language": "br",
  "menu_translation_value": "Colunas de tarefas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45fe"),
  "menu_tag_fk": "prj_columns",
  "menu_translation_language": "de",
  "menu_translation_value": "Farben f"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b45ff"),
  "menu_tag_fk": "prj_columns",
  "menu_translation_language": "en",
  "menu_translation_value": "Tasks columns"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4600"),
  "menu_tag_fk": "prj_columns",
  "menu_translation_language": "es",
  "menu_translation_value": "Columnas de tareas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4601"),
  "menu_tag_fk": "prj_columns",
  "menu_translation_language": "fr",
  "menu_translation_value": "Colonnes t"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4602"),
  "menu_tag_fk": "prj_feature",
  "menu_translation_language": "br",
  "menu_translation_value": "Caracter"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4603"),
  "menu_tag_fk": "prj_feature",
  "menu_translation_language": "de",
  "menu_translation_value": "Merkmale"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4604"),
  "menu_tag_fk": "prj_feature",
  "menu_translation_language": "en",
  "menu_translation_value": "Features"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4605"),
  "menu_tag_fk": "prj_feature",
  "menu_translation_language": "es",
  "menu_translation_value": "Funcionalidades"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4606"),
  "menu_tag_fk": "prj_feature",
  "menu_translation_language": "fr",
  "menu_translation_value": "Fonctions"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4607"),
  "menu_tag_fk": "prj_issues_impact",
  "menu_translation_language": "br",
  "menu_translation_value": "Avalia"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4608"),
  "menu_tag_fk": "prj_issues_impact",
  "menu_translation_language": "de",
  "menu_translation_value": "Beurteilung"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4609"),
  "menu_tag_fk": "prj_issues_impact",
  "menu_translation_language": "en",
  "menu_translation_value": "Assessment"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b460a"),
  "menu_tag_fk": "prj_issues_impact",
  "menu_translation_language": "es",
  "menu_translation_value": "Evaluacion"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b460b"),
  "menu_tag_fk": "prj_issues_impact",
  "menu_translation_language": "fr",
  "menu_translation_value": "Evaluation"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b460c"),
  "menu_tag_fk": "prj_issues_progress",
  "menu_translation_language": "br",
  "menu_translation_value": "Progresso das a"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b460d"),
  "menu_tag_fk": "prj_issues_progress",
  "menu_translation_language": "de",
  "menu_translation_value": "Fortschritt"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b460e"),
  "menu_tag_fk": "prj_issues_progress",
  "menu_translation_language": "en",
  "menu_translation_value": "Actions progress"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b460f"),
  "menu_tag_fk": "prj_issues_progress",
  "menu_translation_language": "es",
  "menu_translation_value": "Seguimiento de acciones"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4610"),
  "menu_tag_fk": "prj_issues_progress",
  "menu_translation_language": "fr",
  "menu_translation_value": "Suivi actions"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4611"),
  "menu_tag_fk": "prj_kanban",
  "menu_translation_language": "br",
  "menu_translation_value": "Kanban"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4612"),
  "menu_tag_fk": "prj_kanban",
  "menu_translation_language": "de",
  "menu_translation_value": "Kanban"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4613"),
  "menu_tag_fk": "prj_kanban",
  "menu_translation_language": "en",
  "menu_translation_value": "Dashboard"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4614"),
  "menu_tag_fk": "prj_kanban",
  "menu_translation_language": "es",
  "menu_translation_value": "Kanban"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4615"),
  "menu_tag_fk": "prj_kanban",
  "menu_translation_language": "fr",
  "menu_translation_value": "Kanban"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4616"),
  "menu_tag_fk": "prj_parameters",
  "menu_translation_language": "br",
  "menu_translation_value": "Par"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4617"),
  "menu_tag_fk": "prj_parameters",
  "menu_translation_language": "de",
  "menu_translation_value": "Parameter"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4618"),
  "menu_tag_fk": "prj_parameters",
  "menu_translation_language": "en",
  "menu_translation_value": "Parameters"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4619"),
  "menu_tag_fk": "prj_parameters",
  "menu_translation_language": "es",
  "menu_translation_value": "Configuracion"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b461a"),
  "menu_tag_fk": "prj_parameters",
  "menu_translation_language": "fr",
  "menu_translation_value": "Param"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b461b"),
  "menu_tag_fk": "prj_report",
  "menu_translation_language": "br",
  "menu_translation_value": "Relat"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b461c"),
  "menu_tag_fk": "prj_report",
  "menu_translation_language": "de",
  "menu_translation_value": "Berichte"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b461d"),
  "menu_tag_fk": "prj_report",
  "menu_translation_language": "en",
  "menu_translation_value": "Reports"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b461e"),
  "menu_tag_fk": "prj_report",
  "menu_translation_language": "es",
  "menu_translation_value": "Reportes"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b461f"),
  "menu_tag_fk": "prj_report",
  "menu_translation_language": "fr",
  "menu_translation_value": "Rapports"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4620"),
  "menu_tag_fk": "prj_settings",
  "menu_translation_language": "br",
  "menu_translation_value": "Valores de atributos"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4621"),
  "menu_tag_fk": "prj_settings",
  "menu_translation_language": "de",
  "menu_translation_value": "Attribute"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4622"),
  "menu_tag_fk": "prj_settings",
  "menu_translation_language": "en",
  "menu_translation_value": "Attributes values"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4623"),
  "menu_tag_fk": "prj_settings",
  "menu_translation_language": "es",
  "menu_translation_value": "Valor de atributos"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4624"),
  "menu_tag_fk": "prj_settings",
  "menu_translation_language": "fr",
  "menu_translation_value": "Valeurs attributs"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4625"),
  "menu_tag_fk": "prj_tags",
  "menu_translation_language": "br",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4626"),
  "menu_tag_fk": "prj_tags",
  "menu_translation_language": "de",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4627"),
  "menu_tag_fk": "prj_tags",
  "menu_translation_language": "en",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4628"),
  "menu_tag_fk": "prj_tags",
  "menu_translation_language": "es",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4629"),
  "menu_tag_fk": "prj_tags",
  "menu_translation_language": "fr",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b462a"),
  "menu_tag_fk": "projects",
  "menu_translation_language": "br",
  "menu_translation_value": "Portfolio"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b462b"),
  "menu_tag_fk": "projects",
  "menu_translation_language": "de",
  "menu_translation_value": "Protfolio"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b462c"),
  "menu_tag_fk": "projects",
  "menu_translation_language": "en",
  "menu_translation_value": "Portfolio"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b462d"),
  "menu_tag_fk": "projects",
  "menu_translation_language": "es",
  "menu_translation_value": "Portafolio"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b462e"),
  "menu_tag_fk": "projects",
  "menu_translation_language": "fr",
  "menu_translation_value": "Portefeuille"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b462f"),
  "menu_tag_fk": "settings",
  "menu_translation_language": "br",
  "menu_translation_value": "Configura"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4630"),
  "menu_tag_fk": "settings",
  "menu_translation_language": "de",
  "menu_translation_value": "Projekteinstellungen"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4631"),
  "menu_tag_fk": "settings",
  "menu_translation_language": "en",
  "menu_translation_value": "Project configuration"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4632"),
  "menu_tag_fk": "settings",
  "menu_translation_language": "es",
  "menu_translation_value": "Configuraci"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4633"),
  "menu_tag_fk": "settings",
  "menu_translation_language": "fr",
  "menu_translation_value": "Configuration projet"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4634"),
  "menu_tag_fk": "team",
  "menu_translation_language": "br",
  "menu_translation_value": "Time"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4635"),
  "menu_tag_fk": "team",
  "menu_translation_language": "de",
  "menu_translation_value": "Team"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4636"),
  "menu_tag_fk": "team",
  "menu_translation_language": "en",
  "menu_translation_value": "Team"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4637"),
  "menu_tag_fk": "team",
  "menu_translation_language": "es",
  "menu_translation_value": "Equipo"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4638"),
  "menu_tag_fk": "team",
  "menu_translation_language": "fr",
  "menu_translation_value": "Equipe"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4639"),
  "menu_tag_fk": "team_tasks",
  "menu_translation_language": "br",
  "menu_translation_value": "Tarefas do time"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b463a"),
  "menu_tag_fk": "team_tasks",
  "menu_translation_language": "de",
  "menu_translation_value": "Teamaufgaben"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b463b"),
  "menu_tag_fk": "team_tasks",
  "menu_translation_language": "en",
  "menu_translation_value": "Team tasks"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b463c"),
  "menu_tag_fk": "team_tasks",
  "menu_translation_language": "es",
  "menu_translation_value": "Reparticion de tareas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b463d"),
  "menu_tag_fk": "team_tasks",
  "menu_translation_language": "fr",
  "menu_translation_value": "R"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b463e"),
  "menu_tag_fk": "trash_action",
  "menu_translation_language": "br",
  "menu_translation_value": "Lixeira de a"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b463f"),
  "menu_tag_fk": "trash_action",
  "menu_translation_language": "de",
  "menu_translation_value": "gel"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4640"),
  "menu_tag_fk": "trash_action",
  "menu_translation_language": "en",
  "menu_translation_value": "Actions trash"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4641"),
  "menu_tag_fk": "trash_action",
  "menu_translation_language": "es",
  "menu_translation_value": "Papelera de acciones"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4642"),
  "menu_tag_fk": "trash_action",
  "menu_translation_language": "fr",
  "menu_translation_value": "Poubelle actions"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4643"),
  "menu_tag_fk": "trash_issue",
  "menu_translation_language": "br",
  "menu_translation_value": "Lixeira de problemas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4644"),
  "menu_tag_fk": "trash_issue",
  "menu_translation_language": "de",
  "menu_translation_value": "gel"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4645"),
  "menu_tag_fk": "trash_issue",
  "menu_translation_language": "en",
  "menu_translation_value": "Issues trash"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4646"),
  "menu_tag_fk": "trash_issue",
  "menu_translation_language": "es",
  "menu_translation_value": "Papelera de errores"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4647"),
  "menu_tag_fk": "trash_issue",
  "menu_translation_language": "fr",
  "menu_translation_value": "Poubelle"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4648"),
  "menu_tag_fk": "trash_tsk",
  "menu_translation_language": "br",
  "menu_translation_value": "Lixeira de tarefas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4649"),
  "menu_tag_fk": "trash_tsk",
  "menu_translation_language": "de",
  "menu_translation_value": "gel"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b464a"),
  "menu_tag_fk": "trash_tsk",
  "menu_translation_language": "en",
  "menu_translation_value": "Tasks trash"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b464b"),
  "menu_tag_fk": "trash_tsk",
  "menu_translation_language": "es",
  "menu_translation_value": "Papelera de tareas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b464c"),
  "menu_tag_fk": "trash_tsk",
  "menu_translation_language": "fr",
  "menu_translation_value": "Poubelle t"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b464d"),
  "menu_tag_fk": "trash_us",
  "menu_translation_language": "br",
  "menu_translation_value": "Lixeira de US"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b464e"),
  "menu_tag_fk": "trash_us",
  "menu_translation_language": "de",
  "menu_translation_value": "gel"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b464f"),
  "menu_tag_fk": "trash_us",
  "menu_translation_language": "en",
  "menu_translation_value": "US trash"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4650"),
  "menu_tag_fk": "trash_us",
  "menu_translation_language": "es",
  "menu_translation_value": "Papelera de US"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4651"),
  "menu_tag_fk": "trash_us",
  "menu_translation_language": "fr",
  "menu_translation_value": "Poubelle US"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4652"),
  "menu_tag_fk": "us_review",
  "menu_translation_language": "br",
  "menu_translation_value": "Business Value"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4653"),
  "menu_tag_fk": "us_review",
  "menu_translation_language": "de",
  "menu_translation_value": "Wirtschaftlicher Nutzen"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4654"),
  "menu_tag_fk": "us_review",
  "menu_translation_language": "en",
  "menu_translation_value": "Business Value"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4655"),
  "menu_tag_fk": "us_review",
  "menu_translation_language": "es",
  "menu_translation_value": "Business Value"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4656"),
  "menu_tag_fk": "us_review",
  "menu_translation_language": "fr",
  "menu_translation_value": "Business Value"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4657"),
  "menu_tag_fk": "us_roadmap",
  "menu_translation_language": "br",
  "menu_translation_value": "US roadmap"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4658"),
  "menu_tag_fk": "us_roadmap",
  "menu_translation_language": "de",
  "menu_translation_value": "US Roadmap"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4659"),
  "menu_tag_fk": "us_roadmap",
  "menu_translation_language": "en",
  "menu_translation_value": "US roadmap"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b465a"),
  "menu_tag_fk": "us_roadmap",
  "menu_translation_language": "es",
  "menu_translation_value": "US roadmap"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b465b"),
  "menu_tag_fk": "us_roadmap",
  "menu_translation_language": "fr",
  "menu_translation_value": "US roadmap"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4594"),
  "menu_tag_fk": "admin",
  "menu_translation_language": "br",
  "menu_translation_value": "Administra"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4595"),
  "menu_tag_fk": "admin",
  "menu_translation_language": "de",
  "menu_translation_value": "Verwaltung"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4596"),
  "menu_tag_fk": "admin",
  "menu_translation_language": "en",
  "menu_translation_value": "Administration"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4597"),
  "menu_tag_fk": "admin",
  "menu_translation_language": "es",
  "menu_translation_value": "Administraci"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4598"),
  "menu_tag_fk": "admin",
  "menu_translation_language": "fr",
  "menu_translation_value": "Administration"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4599"),
  "menu_tag_fk": "admin_param",
  "menu_translation_language": "br",
  "menu_translation_value": "Configura"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b459a"),
  "menu_tag_fk": "admin_param",
  "menu_translation_language": "de",
  "menu_translation_value": "Einstellungen"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b459b"),
  "menu_tag_fk": "admin_param",
  "menu_translation_language": "en",
  "menu_translation_value": "Settings"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b459c"),
  "menu_tag_fk": "admin_param",
  "menu_translation_language": "es",
  "menu_translation_value": "Configuraci"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b459d"),
  "menu_tag_fk": "admin_param",
  "menu_translation_language": "fr",
  "menu_translation_value": "Param"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b459e"),
  "menu_tag_fk": "admin_profile",
  "menu_translation_language": "br",
  "menu_translation_value": "Perfis"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b459f"),
  "menu_tag_fk": "admin_profile",
  "menu_translation_language": "de",
  "menu_translation_value": "Profile"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45a0"),
  "menu_tag_fk": "admin_profile",
  "menu_translation_language": "en",
  "menu_translation_value": "Profiles"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45a1"),
  "menu_tag_fk": "admin_profile",
  "menu_translation_language": "es",
  "menu_translation_value": "Perfiles"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45a2"),
  "menu_tag_fk": "admin_profile",
  "menu_translation_language": "fr",
  "menu_translation_value": "Profils"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45a3"),
  "menu_tag_fk": "admin_user",
  "menu_translation_language": "br",
  "menu_translation_value": "Usu"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45a4"),
  "menu_tag_fk": "admin_user",
  "menu_translation_language": "de",
  "menu_translation_value": "Benutzer"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45a5"),
  "menu_tag_fk": "admin_user",
  "menu_translation_language": "en",
  "menu_translation_value": "Users"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45a6"),
  "menu_tag_fk": "admin_user",
  "menu_translation_language": "es",
  "menu_translation_value": "Usuarios"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45a7"),
  "menu_tag_fk": "admin_user",
  "menu_translation_language": "fr",
  "menu_translation_value": "Utilisateurs"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45a8"),
  "menu_tag_fk": "app_admin",
  "menu_translation_language": "br",
  "menu_translation_value": "Configura"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45a9"),
  "menu_tag_fk": "app_admin",
  "menu_translation_language": "de",
  "menu_translation_value": "Globale Einstellungen"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45aa"),
  "menu_tag_fk": "app_admin",
  "menu_translation_language": "en",
  "menu_translation_value": "Global settings"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ab"),
  "menu_tag_fk": "app_admin",
  "menu_translation_language": "es",
  "menu_translation_value": "Configuracion general"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ac"),
  "menu_tag_fk": "app_admin",
  "menu_translation_language": "fr",
  "menu_translation_value": "Param"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ad"),
  "menu_tag_fk": "app_columns",
  "menu_translation_language": "br",
  "menu_translation_value": "Templates de colunas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ae"),
  "menu_tag_fk": "app_columns",
  "menu_translation_language": "de",
  "menu_translation_value": "Spaltenvorlage"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45af"),
  "menu_tag_fk": "app_columns",
  "menu_translation_language": "en",
  "menu_translation_value": "Columns template"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45b0"),
  "menu_tag_fk": "app_columns",
  "menu_translation_language": "es",
  "menu_translation_value": "Modelo de columnas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45b1"),
  "menu_tag_fk": "app_columns",
  "menu_translation_language": "fr",
  "menu_translation_value": "Mod"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45b2"),
  "menu_tag_fk": "app_prj_templates",
  "menu_translation_language": "br",
  "menu_translation_value": "Templates de projetos"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45b3"),
  "menu_tag_fk": "app_prj_templates",
  "menu_translation_language": "de",
  "menu_translation_value": "Projektvorlage"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45b4"),
  "menu_tag_fk": "app_prj_templates",
  "menu_translation_language": "en",
  "menu_translation_value": "Projects templates"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45b5"),
  "menu_tag_fk": "app_prj_templates",
  "menu_translation_language": "es",
  "menu_translation_value": "Modelo de proyectos"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45b6"),
  "menu_tag_fk": "app_prj_templates",
  "menu_translation_language": "fr",
  "menu_translation_value": "Mod"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45b7"),
  "menu_tag_fk": "app_tags",
  "menu_translation_language": "br",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45b8"),
  "menu_tag_fk": "app_tags",
  "menu_translation_language": "de",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45b9"),
  "menu_tag_fk": "app_tags",
  "menu_translation_language": "en",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ba"),
  "menu_tag_fk": "app_tags",
  "menu_translation_language": "es",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45bb"),
  "menu_tag_fk": "app_tags",
  "menu_translation_language": "fr",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45bc"),
  "menu_tag_fk": "app_tpl_checklist",
  "menu_translation_language": "br",
  "menu_translation_value": "Template de checklist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45bd"),
  "menu_tag_fk": "app_tpl_checklist",
  "menu_translation_language": "de",
  "menu_translation_value": "Vorlage f"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45be"),
  "menu_tag_fk": "app_tpl_checklist",
  "menu_translation_language": "en",
  "menu_translation_value": "Checklist template"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45bf"),
  "menu_tag_fk": "app_tpl_checklist",
  "menu_translation_language": "es",
  "menu_translation_value": "Modelo de la checklist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45c0"),
  "menu_tag_fk": "app_tpl_checklist",
  "menu_translation_language": "fr",
  "menu_translation_value": "Mod"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45c1"),
  "menu_tag_fk": "ceremony",
  "menu_translation_language": "br",
  "menu_translation_value": "US de prioriza"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45c2"),
  "menu_tag_fk": "ceremony",
  "menu_translation_language": "de",
  "menu_translation_value": "US Priorit"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45c3"),
  "menu_tag_fk": "ceremony",
  "menu_translation_language": "en",
  "menu_translation_value": "US priority"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45c4"),
  "menu_tag_fk": "ceremony",
  "menu_translation_language": "es",
  "menu_translation_value": "US de priorizaci"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45c5"),
  "menu_tag_fk": "ceremony",
  "menu_translation_language": "fr",
  "menu_translation_value": "Priorit"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45c6"),
  "menu_tag_fk": "checklist",
  "menu_translation_language": "br",
  "menu_translation_value": "Checklist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45c7"),
  "menu_tag_fk": "checklist",
  "menu_translation_language": "de",
  "menu_translation_value": "Checklisten"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45c8"),
  "menu_tag_fk": "checklist",
  "menu_translation_language": "en",
  "menu_translation_value": "Checklist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45c9"),
  "menu_tag_fk": "checklist",
  "menu_translation_language": "es",
  "menu_translation_value": "Checklist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ca"),
  "menu_tag_fk": "checklist",
  "menu_translation_language": "fr",
  "menu_translation_value": "Checklist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45cb"),
  "menu_tag_fk": "cockpit",
  "menu_translation_language": "br",
  "menu_translation_value": "Cockpit do projeto"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45cc"),
  "menu_tag_fk": "cockpit",
  "menu_translation_language": "de",
  "menu_translation_value": "Projekt"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45cd"),
  "menu_tag_fk": "cockpit",
  "menu_translation_language": "en",
  "menu_translation_value": "Project cockpit"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ce"),
  "menu_tag_fk": "cockpit",
  "menu_translation_language": "es",
  "menu_translation_value": "Proyecto piloto"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45cf"),
  "menu_tag_fk": "cockpit",
  "menu_translation_language": "fr",
  "menu_translation_value": "Cockpit projet"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45d0"),
  "menu_tag_fk": "color_uses",
  "menu_translation_language": "br",
  "menu_translation_value": "Utiliza"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45d1"),
  "menu_tag_fk": "color_uses",
  "menu_translation_language": "de",
  "menu_translation_value": "Farbzuordnung"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45d2"),
  "menu_tag_fk": "color_uses",
  "menu_translation_language": "en",
  "menu_translation_value": "Colors uses"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45d3"),
  "menu_tag_fk": "color_uses",
  "menu_translation_language": "es",
  "menu_translation_value": "Asignaci"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45d4"),
  "menu_tag_fk": "color_uses",
  "menu_translation_language": "fr",
  "menu_translation_value": "Affectation des couleurs"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45d5"),
  "menu_tag_fk": "colors",
  "menu_translation_language": "br",
  "menu_translation_value": "Cores das notas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45d6"),
  "menu_tag_fk": "colors",
  "menu_translation_language": "de",
  "menu_translation_value": "Farben"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45d7"),
  "menu_tag_fk": "colors",
  "menu_translation_language": "en",
  "menu_translation_value": "Colors"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45d8"),
  "menu_tag_fk": "colors",
  "menu_translation_language": "es",
  "menu_translation_value": "Colores"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45d9"),
  "menu_tag_fk": "colors",
  "menu_translation_language": "fr",
  "menu_translation_value": "Couleurs"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45da"),
  "menu_tag_fk": "connections",
  "menu_translation_language": "br",
  "menu_translation_value": "Conex"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45db"),
  "menu_tag_fk": "connections",
  "menu_translation_language": "de",
  "menu_translation_value": "Verbindungen"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45dc"),
  "menu_tag_fk": "connections",
  "menu_translation_language": "en",
  "menu_translation_value": "Connections"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45dd"),
  "menu_tag_fk": "connections",
  "menu_translation_language": "es",
  "menu_translation_value": "Conexiones"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45de"),
  "menu_tag_fk": "connections",
  "menu_translation_language": "fr",
  "menu_translation_value": "Connexions"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45df"),
  "menu_tag_fk": "issue_history",
  "menu_translation_language": "br",
  "menu_translation_value": "Hist"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45e0"),
  "menu_tag_fk": "issue_history",
  "menu_translation_language": "de",
  "menu_translation_value": "Historie"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45e1"),
  "menu_tag_fk": "issue_history",
  "menu_translation_language": "en",
  "menu_translation_value": "History"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45e2"),
  "menu_tag_fk": "issue_history",
  "menu_translation_language": "es",
  "menu_translation_value": "Historial"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45e3"),
  "menu_tag_fk": "issue_history",
  "menu_translation_language": "fr",
  "menu_translation_value": "Historique"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45e4"),
  "menu_tag_fk": "issues",
  "menu_translation_language": "br",
  "menu_translation_value": "Problemas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45e5"),
  "menu_tag_fk": "issues",
  "menu_translation_language": "de",
  "menu_translation_value": "Vorf"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45e6"),
  "menu_tag_fk": "issues",
  "menu_translation_language": "en",
  "menu_translation_value": "Issues"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45e7"),
  "menu_tag_fk": "issues",
  "menu_translation_language": "es",
  "menu_translation_value": "Errores"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45e8"),
  "menu_tag_fk": "issues",
  "menu_translation_language": "fr",
  "menu_translation_value": "RADAR"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45e9"),
  "menu_tag_fk": "languages",
  "menu_translation_language": "br",
  "menu_translation_value": "Idiomas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ea"),
  "menu_tag_fk": "languages",
  "menu_translation_language": "de",
  "menu_translation_value": "Sprachen"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45eb"),
  "menu_tag_fk": "languages",
  "menu_translation_language": "en",
  "menu_translation_value": "Languages"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ec"),
  "menu_tag_fk": "languages",
  "menu_translation_language": "es",
  "menu_translation_value": "Idiomas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ed"),
  "menu_tag_fk": "languages",
  "menu_translation_language": "fr",
  "menu_translation_value": "Langues"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ee"),
  "menu_tag_fk": "my_profile",
  "menu_translation_language": "br",
  "menu_translation_value": "Meu perfil"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ef"),
  "menu_tag_fk": "my_profile",
  "menu_translation_language": "de",
  "menu_translation_value": "Mein Profil"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45f0"),
  "menu_tag_fk": "my_profile",
  "menu_translation_language": "en",
  "menu_translation_value": "My profile"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45f1"),
  "menu_tag_fk": "my_profile",
  "menu_translation_language": "es",
  "menu_translation_value": "Mi perfil"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45f2"),
  "menu_tag_fk": "my_profile",
  "menu_translation_language": "fr",
  "menu_translation_value": "Mon profil"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45f3"),
  "menu_tag_fk": "poker_plan",
  "menu_translation_language": "br",
  "menu_translation_value": "Complexidade"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45f4"),
  "menu_tag_fk": "poker_plan",
  "menu_translation_language": "de",
  "menu_translation_value": "Komplexit"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45f5"),
  "menu_tag_fk": "poker_plan",
  "menu_translation_language": "en",
  "menu_translation_value": "Complexity"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45f6"),
  "menu_tag_fk": "poker_plan",
  "menu_translation_language": "es",
  "menu_translation_value": "Complejidad"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45f7"),
  "menu_tag_fk": "poker_plan",
  "menu_translation_language": "fr",
  "menu_translation_value": "Complexit"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45f8"),
  "menu_tag_fk": "prj_colors",
  "menu_translation_language": "br",
  "menu_translation_value": "Cores"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45f9"),
  "menu_tag_fk": "prj_colors",
  "menu_translation_language": "de",
  "menu_translation_value": "Farben"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45fa"),
  "menu_tag_fk": "prj_colors",
  "menu_translation_language": "en",
  "menu_translation_value": "Colors"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45fb"),
  "menu_tag_fk": "prj_colors",
  "menu_translation_language": "es",
  "menu_translation_value": "Colores"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45fc"),
  "menu_tag_fk": "prj_colors",
  "menu_translation_language": "fr",
  "menu_translation_value": "Couleurs"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45fd"),
  "menu_tag_fk": "prj_columns",
  "menu_translation_language": "br",
  "menu_translation_value": "Colunas de tarefas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45fe"),
  "menu_tag_fk": "prj_columns",
  "menu_translation_language": "de",
  "menu_translation_value": "Farben f"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b45ff"),
  "menu_tag_fk": "prj_columns",
  "menu_translation_language": "en",
  "menu_translation_value": "Tasks columns"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4600"),
  "menu_tag_fk": "prj_columns",
  "menu_translation_language": "es",
  "menu_translation_value": "Columnas de tareas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4601"),
  "menu_tag_fk": "prj_columns",
  "menu_translation_language": "fr",
  "menu_translation_value": "Colonnes t"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4602"),
  "menu_tag_fk": "prj_feature",
  "menu_translation_language": "br",
  "menu_translation_value": "Caracter"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4603"),
  "menu_tag_fk": "prj_feature",
  "menu_translation_language": "de",
  "menu_translation_value": "Merkmale"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4604"),
  "menu_tag_fk": "prj_feature",
  "menu_translation_language": "en",
  "menu_translation_value": "Features"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4605"),
  "menu_tag_fk": "prj_feature",
  "menu_translation_language": "es",
  "menu_translation_value": "Funcionalidades"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4606"),
  "menu_tag_fk": "prj_feature",
  "menu_translation_language": "fr",
  "menu_translation_value": "Fonctions"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4607"),
  "menu_tag_fk": "prj_issues_impact",
  "menu_translation_language": "br",
  "menu_translation_value": "Avalia"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4608"),
  "menu_tag_fk": "prj_issues_impact",
  "menu_translation_language": "de",
  "menu_translation_value": "Beurteilung"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4609"),
  "menu_tag_fk": "prj_issues_impact",
  "menu_translation_language": "en",
  "menu_translation_value": "Assessment"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b460a"),
  "menu_tag_fk": "prj_issues_impact",
  "menu_translation_language": "es",
  "menu_translation_value": "Evaluacion"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b460b"),
  "menu_tag_fk": "prj_issues_impact",
  "menu_translation_language": "fr",
  "menu_translation_value": "Evaluation"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b460c"),
  "menu_tag_fk": "prj_issues_progress",
  "menu_translation_language": "br",
  "menu_translation_value": "Progresso das a"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b460d"),
  "menu_tag_fk": "prj_issues_progress",
  "menu_translation_language": "de",
  "menu_translation_value": "Fortschritt"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b460e"),
  "menu_tag_fk": "prj_issues_progress",
  "menu_translation_language": "en",
  "menu_translation_value": "Actions progress"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b460f"),
  "menu_tag_fk": "prj_issues_progress",
  "menu_translation_language": "es",
  "menu_translation_value": "Seguimiento de acciones"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4610"),
  "menu_tag_fk": "prj_issues_progress",
  "menu_translation_language": "fr",
  "menu_translation_value": "Suivi actions"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4611"),
  "menu_tag_fk": "prj_kanban",
  "menu_translation_language": "br",
  "menu_translation_value": "Kanban"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4612"),
  "menu_tag_fk": "prj_kanban",
  "menu_translation_language": "de",
  "menu_translation_value": "Kanban"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4613"),
  "menu_tag_fk": "prj_kanban",
  "menu_translation_language": "en",
  "menu_translation_value": "Dashboard"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4614"),
  "menu_tag_fk": "prj_kanban",
  "menu_translation_language": "es",
  "menu_translation_value": "Kanban"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4615"),
  "menu_tag_fk": "prj_kanban",
  "menu_translation_language": "fr",
  "menu_translation_value": "Kanban"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4616"),
  "menu_tag_fk": "prj_parameters",
  "menu_translation_language": "br",
  "menu_translation_value": "Par"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4617"),
  "menu_tag_fk": "prj_parameters",
  "menu_translation_language": "de",
  "menu_translation_value": "Parameter"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4618"),
  "menu_tag_fk": "prj_parameters",
  "menu_translation_language": "en",
  "menu_translation_value": "Parameters"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4619"),
  "menu_tag_fk": "prj_parameters",
  "menu_translation_language": "es",
  "menu_translation_value": "Configuracion"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b461a"),
  "menu_tag_fk": "prj_parameters",
  "menu_translation_language": "fr",
  "menu_translation_value": "Param"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b461b"),
  "menu_tag_fk": "prj_report",
  "menu_translation_language": "br",
  "menu_translation_value": "Relat"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b461c"),
  "menu_tag_fk": "prj_report",
  "menu_translation_language": "de",
  "menu_translation_value": "Berichte"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b461d"),
  "menu_tag_fk": "prj_report",
  "menu_translation_language": "en",
  "menu_translation_value": "Reports"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b461e"),
  "menu_tag_fk": "prj_report",
  "menu_translation_language": "es",
  "menu_translation_value": "Reportes"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b461f"),
  "menu_tag_fk": "prj_report",
  "menu_translation_language": "fr",
  "menu_translation_value": "Rapports"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4620"),
  "menu_tag_fk": "prj_settings",
  "menu_translation_language": "br",
  "menu_translation_value": "Valores de atributos"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4621"),
  "menu_tag_fk": "prj_settings",
  "menu_translation_language": "de",
  "menu_translation_value": "Attribute"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4622"),
  "menu_tag_fk": "prj_settings",
  "menu_translation_language": "en",
  "menu_translation_value": "Attributes values"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4623"),
  "menu_tag_fk": "prj_settings",
  "menu_translation_language": "es",
  "menu_translation_value": "Valor de atributos"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4624"),
  "menu_tag_fk": "prj_settings",
  "menu_translation_language": "fr",
  "menu_translation_value": "Valeurs attributs"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4625"),
  "menu_tag_fk": "prj_tags",
  "menu_translation_language": "br",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4626"),
  "menu_tag_fk": "prj_tags",
  "menu_translation_language": "de",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4627"),
  "menu_tag_fk": "prj_tags",
  "menu_translation_language": "en",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4628"),
  "menu_tag_fk": "prj_tags",
  "menu_translation_language": "es",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4629"),
  "menu_tag_fk": "prj_tags",
  "menu_translation_language": "fr",
  "menu_translation_value": "Tags"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b462a"),
  "menu_tag_fk": "projects",
  "menu_translation_language": "br",
  "menu_translation_value": "Portfolio"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b462b"),
  "menu_tag_fk": "projects",
  "menu_translation_language": "de",
  "menu_translation_value": "Protfolio"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b462c"),
  "menu_tag_fk": "projects",
  "menu_translation_language": "en",
  "menu_translation_value": "Portfolio"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b462d"),
  "menu_tag_fk": "projects",
  "menu_translation_language": "es",
  "menu_translation_value": "Portafolio"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b462e"),
  "menu_tag_fk": "projects",
  "menu_translation_language": "fr",
  "menu_translation_value": "Portefeuille"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b462f"),
  "menu_tag_fk": "settings",
  "menu_translation_language": "br",
  "menu_translation_value": "Configura"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4630"),
  "menu_tag_fk": "settings",
  "menu_translation_language": "de",
  "menu_translation_value": "Projekteinstellungen"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4631"),
  "menu_tag_fk": "settings",
  "menu_translation_language": "en",
  "menu_translation_value": "Project configuration"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4632"),
  "menu_tag_fk": "settings",
  "menu_translation_language": "es",
  "menu_translation_value": "Configuraci"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4633"),
  "menu_tag_fk": "settings",
  "menu_translation_language": "fr",
  "menu_translation_value": "Configuration projet"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4634"),
  "menu_tag_fk": "team",
  "menu_translation_language": "br",
  "menu_translation_value": "Time"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4635"),
  "menu_tag_fk": "team",
  "menu_translation_language": "de",
  "menu_translation_value": "Team"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4636"),
  "menu_tag_fk": "team",
  "menu_translation_language": "en",
  "menu_translation_value": "Team"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4637"),
  "menu_tag_fk": "team",
  "menu_translation_language": "es",
  "menu_translation_value": "Equipo"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4638"),
  "menu_tag_fk": "team",
  "menu_translation_language": "fr",
  "menu_translation_value": "Equipe"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4639"),
  "menu_tag_fk": "team_tasks",
  "menu_translation_language": "br",
  "menu_translation_value": "Tarefas do time"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b463a"),
  "menu_tag_fk": "team_tasks",
  "menu_translation_language": "de",
  "menu_translation_value": "Teamaufgaben"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b463b"),
  "menu_tag_fk": "team_tasks",
  "menu_translation_language": "en",
  "menu_translation_value": "Team tasks"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b463c"),
  "menu_tag_fk": "team_tasks",
  "menu_translation_language": "es",
  "menu_translation_value": "Reparticion de tareas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b463d"),
  "menu_tag_fk": "team_tasks",
  "menu_translation_language": "fr",
  "menu_translation_value": "R"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b463e"),
  "menu_tag_fk": "trash_action",
  "menu_translation_language": "br",
  "menu_translation_value": "Lixeira de a"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b463f"),
  "menu_tag_fk": "trash_action",
  "menu_translation_language": "de",
  "menu_translation_value": "gel"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4640"),
  "menu_tag_fk": "trash_action",
  "menu_translation_language": "en",
  "menu_translation_value": "Actions trash"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4641"),
  "menu_tag_fk": "trash_action",
  "menu_translation_language": "es",
  "menu_translation_value": "Papelera de acciones"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4642"),
  "menu_tag_fk": "trash_action",
  "menu_translation_language": "fr",
  "menu_translation_value": "Poubelle actions"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4643"),
  "menu_tag_fk": "trash_issue",
  "menu_translation_language": "br",
  "menu_translation_value": "Lixeira de problemas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4644"),
  "menu_tag_fk": "trash_issue",
  "menu_translation_language": "de",
  "menu_translation_value": "gel"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4645"),
  "menu_tag_fk": "trash_issue",
  "menu_translation_language": "en",
  "menu_translation_value": "Issues trash"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4646"),
  "menu_tag_fk": "trash_issue",
  "menu_translation_language": "es",
  "menu_translation_value": "Papelera de errores"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4647"),
  "menu_tag_fk": "trash_issue",
  "menu_translation_language": "fr",
  "menu_translation_value": "Poubelle"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4648"),
  "menu_tag_fk": "trash_tsk",
  "menu_translation_language": "br",
  "menu_translation_value": "Lixeira de tarefas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4649"),
  "menu_tag_fk": "trash_tsk",
  "menu_translation_language": "de",
  "menu_translation_value": "gel"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b464a"),
  "menu_tag_fk": "trash_tsk",
  "menu_translation_language": "en",
  "menu_translation_value": "Tasks trash"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b464b"),
  "menu_tag_fk": "trash_tsk",
  "menu_translation_language": "es",
  "menu_translation_value": "Papelera de tareas"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b464c"),
  "menu_tag_fk": "trash_tsk",
  "menu_translation_language": "fr",
  "menu_translation_value": "Poubelle t"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b464d"),
  "menu_tag_fk": "trash_us",
  "menu_translation_language": "br",
  "menu_translation_value": "Lixeira de US"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b464e"),
  "menu_tag_fk": "trash_us",
  "menu_translation_language": "de",
  "menu_translation_value": "gel"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b464f"),
  "menu_tag_fk": "trash_us",
  "menu_translation_language": "en",
  "menu_translation_value": "US trash"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4650"),
  "menu_tag_fk": "trash_us",
  "menu_translation_language": "es",
  "menu_translation_value": "Papelera de US"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4651"),
  "menu_tag_fk": "trash_us",
  "menu_translation_language": "fr",
  "menu_translation_value": "Poubelle US"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4652"),
  "menu_tag_fk": "us_review",
  "menu_translation_language": "br",
  "menu_translation_value": "Business Value"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4653"),
  "menu_tag_fk": "us_review",
  "menu_translation_language": "de",
  "menu_translation_value": "Wirtschaftlicher Nutzen"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4654"),
  "menu_tag_fk": "us_review",
  "menu_translation_language": "en",
  "menu_translation_value": "Business Value"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4655"),
  "menu_tag_fk": "us_review",
  "menu_translation_language": "es",
  "menu_translation_value": "Business Value"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4656"),
  "menu_tag_fk": "us_review",
  "menu_translation_language": "fr",
  "menu_translation_value": "Business Value"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4657"),
  "menu_tag_fk": "us_roadmap",
  "menu_translation_language": "br",
  "menu_translation_value": "US roadmap"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4658"),
  "menu_tag_fk": "us_roadmap",
  "menu_translation_language": "de",
  "menu_translation_value": "US Roadmap"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4659"),
  "menu_tag_fk": "us_roadmap",
  "menu_translation_language": "en",
  "menu_translation_value": "US roadmap"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b465a"),
  "menu_tag_fk": "us_roadmap",
  "menu_translation_language": "es",
  "menu_translation_value": "US roadmap"
});
db.getCollection("framework_menus_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b465b"),
  "menu_tag_fk": "us_roadmap",
  "menu_translation_language": "fr",
  "menu_translation_value": "US roadmap"
});

/** framework_parameters records **/
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5463b245f05ef7e0188b465c"),
  "parameter_tag_id": "NBLIST",
  "parameter_value": "3",
  "parameter_display": "1",
  "parameter_type": "INT"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5463b245f05ef7e0188b465d"),
  "parameter_tag_id": "PGNUBR",
  "parameter_value": "12",
  "parameter_display": "1",
  "parameter_type": "INT"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5463b245f05ef7e0188b465e"),
  "parameter_tag_id": "PRJLOC",
  "parameter_value": "1",
  "parameter_display": "1",
  "parameter_type": "SWITCH"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5463b245f05ef7e0188b465f"),
  "parameter_tag_id": "PRJTPL",
  "parameter_value": "3;2;1:3",
  "parameter_display": "0",
  "parameter_type": "STRING"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4660"),
  "parameter_tag_id": "READAC",
  "parameter_value": "1",
  "parameter_display": "1",
  "parameter_type": "SWITCH"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4661"),
  "parameter_tag_id": "RSSACT",
  "parameter_value": "1",
  "parameter_display": "1",
  "parameter_type": "SWITCH"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4662"),
  "parameter_tag_id": "SPOVL",
  "parameter_value": "0",
  "parameter_display": "1",
  "parameter_type": "SWITCH"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4663"),
  "parameter_tag_id": "USECHL",
  "parameter_value": "1",
  "parameter_display": "1",
  "parameter_type": "SWITCH"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4664"),
  "parameter_tag_id": "USEWS",
  "parameter_value": "1",
  "parameter_display": "1",
  "parameter_type": "SWITCH"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4665"),
  "parameter_tag_id": "WSSIZE",
  "parameter_value": "1050",
  "parameter_display": "1",
  "parameter_type": "INT"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b465c"),
  "parameter_tag_id": "NBLIST",
  "parameter_value": "3",
  "parameter_display": "1",
  "parameter_type": "INT"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b465d"),
  "parameter_tag_id": "PGNUBR",
  "parameter_value": "12",
  "parameter_display": "1",
  "parameter_type": "INT"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b465e"),
  "parameter_tag_id": "PRJLOC",
  "parameter_value": "1",
  "parameter_display": "1",
  "parameter_type": "SWITCH"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b465f"),
  "parameter_tag_id": "PRJTPL",
  "parameter_value": "3;2;1:3",
  "parameter_display": "0",
  "parameter_type": "STRING"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4660"),
  "parameter_tag_id": "READAC",
  "parameter_value": "1",
  "parameter_display": "1",
  "parameter_type": "SWITCH"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4661"),
  "parameter_tag_id": "RSSACT",
  "parameter_value": "1",
  "parameter_display": "1",
  "parameter_type": "SWITCH"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4662"),
  "parameter_tag_id": "SPOVL",
  "parameter_value": "0",
  "parameter_display": "1",
  "parameter_type": "SWITCH"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4663"),
  "parameter_tag_id": "USECHL",
  "parameter_value": "1",
  "parameter_display": "1",
  "parameter_type": "SWITCH"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4664"),
  "parameter_tag_id": "USEWS",
  "parameter_value": "1",
  "parameter_display": "1",
  "parameter_type": "SWITCH"
});
db.getCollection("framework_parameters").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4665"),
  "parameter_tag_id": "WSSIZE",
  "parameter_value": "1050",
  "parameter_display": "1",
  "parameter_type": "INT"
});

/** framework_parameters_translations records **/
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4666"),
  "parameter_tag_id_fk": "NBLIST",
  "parameter_translation_language": "br",
  "parameter_translation_value": "N"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4667"),
  "parameter_tag_id_fk": "NBLIST",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Maximale Anzahl von Benutzern in einer Auswahlliste"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4668"),
  "parameter_tag_id_fk": "NBLIST",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Max number of users to use a listbox"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4669"),
  "parameter_tag_id_fk": "NBLIST",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Numero maximo de usuarios para utilizar la lista"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b466a"),
  "parameter_tag_id_fk": "NBLIST",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Nombre limite d'utilisateurs pour utiliser une liste d"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b466b"),
  "parameter_tag_id_fk": "PGNUBR",
  "parameter_translation_language": "br",
  "parameter_translation_value": "N"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b466c"),
  "parameter_tag_id_fk": "PGNUBR",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Anzahl von Objekten auf einer Seite"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b466d"),
  "parameter_tag_id_fk": "PGNUBR",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Number of items displayed in a page"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b466e"),
  "parameter_tag_id_fk": "PGNUBR",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Numero de elementos mostrados en la pagina"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b466f"),
  "parameter_tag_id_fk": "PGNUBR",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Nombre d'"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4670"),
  "parameter_tag_id_fk": "PRJLOC",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Permitir cria"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4671"),
  "parameter_tag_id_fk": "PRJLOC",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Erzeugen lokaler Projekte erlauben"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4672"),
  "parameter_tag_id_fk": "PRJLOC",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Allow local projects creation"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4673"),
  "parameter_tag_id_fk": "PRJLOC",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Permitir la creacion de proyectos locales"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4674"),
  "parameter_tag_id_fk": "PRJLOC",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Autorise la cr"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4675"),
  "parameter_tag_id_fk": "READAC",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Cada novo projeto "
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4676"),
  "parameter_tag_id_fk": "READAC",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Neue Projekte sind "
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4677"),
  "parameter_tag_id_fk": "READAC",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Each new project is public"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4678"),
  "parameter_tag_id_fk": "READAC",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Cada nuevo proyecto es definido como publico por defecto"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4679"),
  "parameter_tag_id_fk": "READAC",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Chaque nouveau projet est d"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b467a"),
  "parameter_tag_id_fk": "RSSACT",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Permitir RSS nos projetos, releases e sprints"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b467b"),
  "parameter_tag_id_fk": "RSSACT",
  "parameter_translation_language": "de",
  "parameter_translation_value": "RSS f"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b467c"),
  "parameter_tag_id_fk": "RSSACT",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Allow RSS on projects,releases and sprints"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b467d"),
  "parameter_tag_id_fk": "RSSACT",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Permitir RSS en proyectos, publicaciones y sprints"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b467e"),
  "parameter_tag_id_fk": "RSSACT",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Autoriser la syndication RSS du contenu des projets, releases et sprints"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b467f"),
  "parameter_tag_id_fk": "SPOVL",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Permitir sobreposi"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4680"),
  "parameter_tag_id_fk": "SPOVL",
  "parameter_translation_language": "de",
  "parameter_translation_value": ""
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4681"),
  "parameter_tag_id_fk": "SPOVL",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Allow sprints ovelapping"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4682"),
  "parameter_tag_id_fk": "SPOVL",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Permitir la superposici"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4683"),
  "parameter_tag_id_fk": "SPOVL",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Autorise la superposition de sprints"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4684"),
  "parameter_tag_id_fk": "USECHL",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Permitir o uso de templates de checklist"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4685"),
  "parameter_tag_id_fk": "USECHL",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Verwendung von Checklist-Vorlagen erlauben"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4686"),
  "parameter_tag_id_fk": "USECHL",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Allow use of checklist template"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4687"),
  "parameter_tag_id_fk": "USECHL",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Permitir el uso del modelo checklist"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4688"),
  "parameter_tag_id_fk": "USECHL",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Autorise l'utilisation du mod"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4689"),
  "parameter_tag_id_fk": "USEWS",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Modo workshop dispon"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b468a"),
  "parameter_tag_id_fk": "USEWS",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Workshop-Modus ist verf"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b468b"),
  "parameter_tag_id_fk": "USEWS",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Workshop mode is available"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b468c"),
  "parameter_tag_id_fk": "USEWS",
  "parameter_translation_language": "es",
  "parameter_translation_value": "El modo Workshop es disponible"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b468d"),
  "parameter_tag_id_fk": "USEWS",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Utilisation du mode Workshop"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b468e"),
  "parameter_tag_id_fk": "WSSIZE",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Tamanho da c"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b468f"),
  "parameter_tag_id_fk": "WSSIZE",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Workshop-Zellengr"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4690"),
  "parameter_tag_id_fk": "WSSIZE",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Workshop cell size"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4691"),
  "parameter_tag_id_fk": "WSSIZE",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Tama"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4692"),
  "parameter_tag_id_fk": "WSSIZE",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Taille du tableau de Workshop"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4666"),
  "parameter_tag_id_fk": "NBLIST",
  "parameter_translation_language": "br",
  "parameter_translation_value": "N"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4667"),
  "parameter_tag_id_fk": "NBLIST",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Maximale Anzahl von Benutzern in einer Auswahlliste"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4668"),
  "parameter_tag_id_fk": "NBLIST",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Max number of users to use a listbox"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4669"),
  "parameter_tag_id_fk": "NBLIST",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Numero maximo de usuarios para utilizar la lista"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b466a"),
  "parameter_tag_id_fk": "NBLIST",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Nombre limite d'utilisateurs pour utiliser une liste d"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b466b"),
  "parameter_tag_id_fk": "PGNUBR",
  "parameter_translation_language": "br",
  "parameter_translation_value": "N"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b466c"),
  "parameter_tag_id_fk": "PGNUBR",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Anzahl von Objekten auf einer Seite"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b466d"),
  "parameter_tag_id_fk": "PGNUBR",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Number of items displayed in a page"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b466e"),
  "parameter_tag_id_fk": "PGNUBR",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Numero de elementos mostrados en la pagina"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b466f"),
  "parameter_tag_id_fk": "PGNUBR",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Nombre d'"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4670"),
  "parameter_tag_id_fk": "PRJLOC",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Permitir cria"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4671"),
  "parameter_tag_id_fk": "PRJLOC",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Erzeugen lokaler Projekte erlauben"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4672"),
  "parameter_tag_id_fk": "PRJLOC",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Allow local projects creation"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4673"),
  "parameter_tag_id_fk": "PRJLOC",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Permitir la creacion de proyectos locales"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4674"),
  "parameter_tag_id_fk": "PRJLOC",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Autorise la cr"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4675"),
  "parameter_tag_id_fk": "READAC",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Cada novo projeto "
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4676"),
  "parameter_tag_id_fk": "READAC",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Neue Projekte sind "
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4677"),
  "parameter_tag_id_fk": "READAC",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Each new project is public"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4678"),
  "parameter_tag_id_fk": "READAC",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Cada nuevo proyecto es definido como publico por defecto"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4679"),
  "parameter_tag_id_fk": "READAC",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Chaque nouveau projet est d"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b467a"),
  "parameter_tag_id_fk": "RSSACT",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Permitir RSS nos projetos, releases e sprints"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b467b"),
  "parameter_tag_id_fk": "RSSACT",
  "parameter_translation_language": "de",
  "parameter_translation_value": "RSS f"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b467c"),
  "parameter_tag_id_fk": "RSSACT",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Allow RSS on projects,releases and sprints"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b467d"),
  "parameter_tag_id_fk": "RSSACT",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Permitir RSS en proyectos, publicaciones y sprints"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b467e"),
  "parameter_tag_id_fk": "RSSACT",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Autoriser la syndication RSS du contenu des projets, releases et sprints"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b467f"),
  "parameter_tag_id_fk": "SPOVL",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Permitir sobreposi"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4680"),
  "parameter_tag_id_fk": "SPOVL",
  "parameter_translation_language": "de",
  "parameter_translation_value": ""
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4681"),
  "parameter_tag_id_fk": "SPOVL",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Allow sprints ovelapping"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4682"),
  "parameter_tag_id_fk": "SPOVL",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Permitir la superposici"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4683"),
  "parameter_tag_id_fk": "SPOVL",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Autorise la superposition de sprints"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4684"),
  "parameter_tag_id_fk": "USECHL",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Permitir o uso de templates de checklist"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4685"),
  "parameter_tag_id_fk": "USECHL",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Verwendung von Checklist-Vorlagen erlauben"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4686"),
  "parameter_tag_id_fk": "USECHL",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Allow use of checklist template"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4687"),
  "parameter_tag_id_fk": "USECHL",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Permitir el uso del modelo checklist"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4688"),
  "parameter_tag_id_fk": "USECHL",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Autorise l'utilisation du mod"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4689"),
  "parameter_tag_id_fk": "USEWS",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Modo workshop dispon"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b468a"),
  "parameter_tag_id_fk": "USEWS",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Workshop-Modus ist verf"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b468b"),
  "parameter_tag_id_fk": "USEWS",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Workshop mode is available"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b468c"),
  "parameter_tag_id_fk": "USEWS",
  "parameter_translation_language": "es",
  "parameter_translation_value": "El modo Workshop es disponible"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b468d"),
  "parameter_tag_id_fk": "USEWS",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Utilisation du mode Workshop"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b468e"),
  "parameter_tag_id_fk": "WSSIZE",
  "parameter_translation_language": "br",
  "parameter_translation_value": "Tamanho da c"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b468f"),
  "parameter_tag_id_fk": "WSSIZE",
  "parameter_translation_language": "de",
  "parameter_translation_value": "Workshop-Zellengr"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4690"),
  "parameter_tag_id_fk": "WSSIZE",
  "parameter_translation_language": "en",
  "parameter_translation_value": "Workshop cell size"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4691"),
  "parameter_tag_id_fk": "WSSIZE",
  "parameter_translation_language": "es",
  "parameter_translation_value": "Tama"
});
db.getCollection("framework_parameters_translations").insert({
  "_id": ObjectId("5478e92cf05ef7f6048b4692"),
  "parameter_tag_id_fk": "WSSIZE",
  "parameter_translation_language": "fr",
  "parameter_translation_value": "Taille du tableau de Workshop"
});

/** framework_profiles records **/
db.getCollection("framework_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4693"),
  "profile_id": "1",
  "profile_name": "2-Administration",
  "profile_type": "GLOBAL",
  "profile_tag": "ADM",
  "profile_default": "0"
});
db.getCollection("framework_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4694"),
  "profile_id": "2",
  "profile_name": "1-Acc",
  "profile_type": "GLOBAL",
  "profile_tag": "STD",
  "profile_default": "1"
});
db.getCollection("framework_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4695"),
  "profile_id": "4",
  "profile_name": "Scrum Master",
  "profile_type": "LOCAL",
  "profile_tag": "GESTION",
  "profile_default": "0"
});
db.getCollection("framework_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4696"),
  "profile_id": "5",
  "profile_name": "Lecteur",
  "profile_type": "LOCAL",
  "profile_tag": "READ",
  "profile_default": "0"
});
db.getCollection("framework_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4697"),
  "profile_id": "6",
  "profile_name": "Product Owner",
  "profile_type": "LOCAL",
  "profile_tag": "PO",
  "profile_default": "0"
});
db.getCollection("framework_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4698"),
  "profile_id": "8",
  "profile_name": "Team Member",
  "profile_type": "LOCAL",
  "profile_tag": "MEMBER",
  "profile_default": "0"
});
db.getCollection("framework_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4693"),
  "profile_id": "1",
  "profile_name": "2-Administration",
  "profile_type": "GLOBAL",
  "profile_tag": "ADM",
  "profile_default": "0"
});
db.getCollection("framework_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4694"),
  "profile_id": "2",
  "profile_name": "1-Acc",
  "profile_type": "GLOBAL",
  "profile_tag": "STD",
  "profile_default": "1"
});
db.getCollection("framework_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4695"),
  "profile_id": "4",
  "profile_name": "Scrum Master",
  "profile_type": "LOCAL",
  "profile_tag": "GESTION",
  "profile_default": "0"
});
db.getCollection("framework_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4696"),
  "profile_id": "5",
  "profile_name": "Lecteur",
  "profile_type": "LOCAL",
  "profile_tag": "READ",
  "profile_default": "0"
});
db.getCollection("framework_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4697"),
  "profile_id": "6",
  "profile_name": "Product Owner",
  "profile_type": "LOCAL",
  "profile_tag": "PO",
  "profile_default": "0"
});
db.getCollection("framework_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4698"),
  "profile_id": "8",
  "profile_name": "Team Member",
  "profile_type": "LOCAL",
  "profile_tag": "MEMBER",
  "profile_default": "0"
});

/** framework_profiles_actions records **/
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4699"),
  "action_tag": "ADDACTION"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b469a"),
  "action_tag": "ADDTASK"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b469b"),
  "action_tag": "ADD_ACTIVITY"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b469c"),
  "action_tag": "ADD_EXT_PRJ_OTHERS"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b469d"),
  "action_tag": "ADD_EXT_PRJ_SELF"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b469e"),
  "action_tag": "ADD_ISSUES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b469f"),
  "action_tag": "ADD_PRJ_OTHERS"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46a0"),
  "action_tag": "ADD_PRJ_SELF"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46a1"),
  "action_tag": "ADD_RELEASE"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46a2"),
  "action_tag": "ADD_SPRINT"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46a3"),
  "action_tag": "ADD_US"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46a4"),
  "action_tag": "ADD_US_REL"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46a5"),
  "action_tag": "ALLOC_TASK"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46a6"),
  "action_tag": "DELACTION"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46a7"),
  "action_tag": "DELPRJ"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46a8"),
  "action_tag": "DELTASK"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46a9"),
  "action_tag": "DEL_ACTIVITIES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46aa"),
  "action_tag": "DEL_ISSUES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ab"),
  "action_tag": "DEL_RELEASE"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ac"),
  "action_tag": "DEL_SPRINT"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ad"),
  "action_tag": "DEL_US"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ae"),
  "action_tag": "MNGPARAMPRJ"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46af"),
  "action_tag": "MNGSTAKEHOLDER"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46b0"),
  "action_tag": "MNG_TAGS"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46b1"),
  "action_tag": "MOVE_ACTION"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46b2"),
  "action_tag": "MOVE_TASK"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46b3"),
  "action_tag": "MOVE_US"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46b4"),
  "action_tag": "MOV_ACTIVITIES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46b5"),
  "action_tag": "ORDACTION"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46b6"),
  "action_tag": "ORDTASK"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46b7"),
  "action_tag": "ORD_ACTIVITIES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46b8"),
  "action_tag": "ORD_ISSUES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46b9"),
  "action_tag": "ORD_US"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ba"),
  "action_tag": "SET_BV"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46bb"),
  "action_tag": "SET_COMPLEXITY"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46bc"),
  "action_tag": "SET_IMPACT"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46bd"),
  "action_tag": "UPDACTION"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46be"),
  "action_tag": "UPDPRJ"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46bf"),
  "action_tag": "UPDTASK"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46c0"),
  "action_tag": "UPD_ACTIVITIES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46c1"),
  "action_tag": "UPD_ISSUES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46c2"),
  "action_tag": "UPD_RELEASE"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46c3"),
  "action_tag": "UPD_SPRINT"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46c4"),
  "action_tag": "UPD_US"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4699"),
  "action_tag": "ADDACTION"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b469a"),
  "action_tag": "ADDTASK"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b469b"),
  "action_tag": "ADD_ACTIVITY"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b469c"),
  "action_tag": "ADD_EXT_PRJ_OTHERS"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b469d"),
  "action_tag": "ADD_EXT_PRJ_SELF"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b469e"),
  "action_tag": "ADD_ISSUES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b469f"),
  "action_tag": "ADD_PRJ_OTHERS"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46a0"),
  "action_tag": "ADD_PRJ_SELF"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46a1"),
  "action_tag": "ADD_RELEASE"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46a2"),
  "action_tag": "ADD_SPRINT"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46a3"),
  "action_tag": "ADD_US"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46a4"),
  "action_tag": "ADD_US_REL"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46a5"),
  "action_tag": "ALLOC_TASK"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46a6"),
  "action_tag": "DELACTION"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46a7"),
  "action_tag": "DELPRJ"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46a8"),
  "action_tag": "DELTASK"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46a9"),
  "action_tag": "DEL_ACTIVITIES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46aa"),
  "action_tag": "DEL_ISSUES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ab"),
  "action_tag": "DEL_RELEASE"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ac"),
  "action_tag": "DEL_SPRINT"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ad"),
  "action_tag": "DEL_US"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ae"),
  "action_tag": "MNGPARAMPRJ"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46af"),
  "action_tag": "MNGSTAKEHOLDER"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46b0"),
  "action_tag": "MNG_TAGS"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46b1"),
  "action_tag": "MOVE_ACTION"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46b2"),
  "action_tag": "MOVE_TASK"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46b3"),
  "action_tag": "MOVE_US"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46b4"),
  "action_tag": "MOV_ACTIVITIES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46b5"),
  "action_tag": "ORDACTION"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46b6"),
  "action_tag": "ORDTASK"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46b7"),
  "action_tag": "ORD_ACTIVITIES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46b8"),
  "action_tag": "ORD_ISSUES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46b9"),
  "action_tag": "ORD_US"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ba"),
  "action_tag": "SET_BV"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46bb"),
  "action_tag": "SET_COMPLEXITY"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46bc"),
  "action_tag": "SET_IMPACT"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46bd"),
  "action_tag": "UPDACTION"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46be"),
  "action_tag": "UPDPRJ"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46bf"),
  "action_tag": "UPDTASK"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46c0"),
  "action_tag": "UPD_ACTIVITIES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46c1"),
  "action_tag": "UPD_ISSUES"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46c2"),
  "action_tag": "UPD_RELEASE"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46c3"),
  "action_tag": "UPD_SPRINT"
});
db.getCollection("framework_profiles_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46c4"),
  "action_tag": "UPD_US"
});

/** framework_profiles_actions_translations records **/
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46c5"),
  "action_tag_fk": "ADDACTION",
  "action_translation_language": "br",
  "action_translation_value": "[ACT] Adicionar uma a"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46c6"),
  "action_tag_fk": "ADDACTION",
  "action_translation_language": "de",
  "action_translation_value": "[RIS] Aktion hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46c7"),
  "action_tag_fk": "ADDACTION",
  "action_translation_language": "en",
  "action_translation_value": "[ACT] Add an action"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46c8"),
  "action_tag_fk": "ADDACTION",
  "action_translation_language": "es",
  "action_translation_value": "[ACT] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46c9"),
  "action_tag_fk": "ADDACTION",
  "action_translation_language": "fr",
  "action_translation_value": "[ACT] Ajouter une action"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ca"),
  "action_tag_fk": "ADDTASK",
  "action_translation_language": "br",
  "action_translation_value": "[TASK] Adicionar tarefas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46cb"),
  "action_tag_fk": "ADDTASK",
  "action_translation_language": "de",
  "action_translation_value": "[TODO] Aufgabe erstellen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46cc"),
  "action_tag_fk": "ADDTASK",
  "action_translation_language": "en",
  "action_translation_value": "[TASK] Add tasks"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46cd"),
  "action_tag_fk": "ADDTASK",
  "action_translation_language": "es",
  "action_translation_value": "[TASK] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ce"),
  "action_tag_fk": "ADDTASK",
  "action_translation_language": "fr",
  "action_translation_value": "[TACHE] Ajouter des t"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46cf"),
  "action_tag_fk": "ADD_ACTIVITY",
  "action_translation_language": "br",
  "action_translation_value": "[ATV] Adicionar uma atividade"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46d0"),
  "action_tag_fk": "ADD_ACTIVITY",
  "action_translation_language": "de",
  "action_translation_value": "[AKT] Aktivit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46d1"),
  "action_tag_fk": "ADD_ACTIVITY",
  "action_translation_language": "en",
  "action_translation_value": "[ATV] Add an activity"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46d2"),
  "action_tag_fk": "ADD_ACTIVITY",
  "action_translation_language": "es",
  "action_translation_value": "[ATV] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46d3"),
  "action_tag_fk": "ADD_ACTIVITY",
  "action_translation_language": "fr",
  "action_translation_value": "[ATV] Ajouter une activit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46d4"),
  "action_tag_fk": "ADD_EXT_PRJ_OTHERS",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Adicionar um projeto externo para outros"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46d5"),
  "action_tag_fk": "ADD_EXT_PRJ_OTHERS",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Externes Projekt f"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46d6"),
  "action_tag_fk": "ADD_EXT_PRJ_OTHERS",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Add an external project for others"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46d7"),
  "action_tag_fk": "ADD_EXT_PRJ_OTHERS",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46d8"),
  "action_tag_fk": "ADD_EXT_PRJ_OTHERS",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] Ajouter un projet externe affect"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46d9"),
  "action_tag_fk": "ADD_EXT_PRJ_SELF",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Adicionar um projeto externo para voc"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46da"),
  "action_tag_fk": "ADD_EXT_PRJ_SELF",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Eigenes externes Projekt hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46db"),
  "action_tag_fk": "ADD_EXT_PRJ_SELF",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Add an external project for oneself"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46dc"),
  "action_tag_fk": "ADD_EXT_PRJ_SELF",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46dd"),
  "action_tag_fk": "ADD_EXT_PRJ_SELF",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] Ajouter un projet externe affect"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46de"),
  "action_tag_fk": "ADD_ISSUES",
  "action_translation_language": "br",
  "action_translation_value": "[ISS] Adicionar problemas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46df"),
  "action_tag_fk": "ADD_ISSUES",
  "action_translation_language": "de",
  "action_translation_value": "[VOR] Vorfall hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46e0"),
  "action_tag_fk": "ADD_ISSUES",
  "action_translation_language": "en",
  "action_translation_value": "[ISS] Add issues"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46e1"),
  "action_tag_fk": "ADD_ISSUES",
  "action_translation_language": "es",
  "action_translation_value": "[ISS] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46e2"),
  "action_tag_fk": "ADD_ISSUES",
  "action_translation_language": "fr",
  "action_translation_value": "[OBS] Enregistrer des obstacles"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46e3"),
  "action_tag_fk": "ADD_PRJ_OTHERS",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Adicionar um projeto para outros"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46e4"),
  "action_tag_fk": "ADD_PRJ_OTHERS",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Projekt f"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46e5"),
  "action_tag_fk": "ADD_PRJ_OTHERS",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Add a project for others"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46e6"),
  "action_tag_fk": "ADD_PRJ_OTHERS",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46e7"),
  "action_tag_fk": "ADD_PRJ_OTHERS",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] Ajouter un projet affect"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46e8"),
  "action_tag_fk": "ADD_PRJ_SELF",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Adicionar um projeto para voc"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46e9"),
  "action_tag_fk": "ADD_PRJ_SELF",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Eigenes Projekt hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ea"),
  "action_tag_fk": "ADD_PRJ_SELF",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Add a project for oneself"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46eb"),
  "action_tag_fk": "ADD_PRJ_SELF",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ec"),
  "action_tag_fk": "ADD_PRJ_SELF",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] Ajouter un projet affect"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ed"),
  "action_tag_fk": "ADD_RELEASE",
  "action_translation_language": "br",
  "action_translation_value": "[REL] Adicionar uma release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ee"),
  "action_tag_fk": "ADD_RELEASE",
  "action_translation_language": "de",
  "action_translation_value": "[REL] Release hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ef"),
  "action_tag_fk": "ADD_RELEASE",
  "action_translation_language": "en",
  "action_translation_value": "[REL] Add a release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46f0"),
  "action_tag_fk": "ADD_RELEASE",
  "action_translation_language": "es",
  "action_translation_value": "[REL] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46f1"),
  "action_tag_fk": "ADD_RELEASE",
  "action_translation_language": "fr",
  "action_translation_value": "[REL] Ajouter une release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46f2"),
  "action_tag_fk": "ADD_SPRINT",
  "action_translation_language": "br",
  "action_translation_value": "[SPR] Adicionar uma sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46f3"),
  "action_tag_fk": "ADD_SPRINT",
  "action_translation_language": "de",
  "action_translation_value": "[SPR] Sprint hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46f4"),
  "action_tag_fk": "ADD_SPRINT",
  "action_translation_language": "en",
  "action_translation_value": "[SPR] Add a sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46f5"),
  "action_tag_fk": "ADD_SPRINT",
  "action_translation_language": "es",
  "action_translation_value": "[SPR] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46f6"),
  "action_tag_fk": "ADD_SPRINT",
  "action_translation_language": "fr",
  "action_translation_value": "[SPR] Ajouter un sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46f7"),
  "action_tag_fk": "ADD_US",
  "action_translation_language": "br",
  "action_translation_value": "[US] Adicionar uma User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46f8"),
  "action_tag_fk": "ADD_US",
  "action_translation_language": "de",
  "action_translation_value": "[US] User-Story anlegen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46f9"),
  "action_tag_fk": "ADD_US",
  "action_translation_language": "en",
  "action_translation_value": "[US] Add an User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46fa"),
  "action_tag_fk": "ADD_US",
  "action_translation_language": "es",
  "action_translation_value": "[US] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46fb"),
  "action_tag_fk": "ADD_US",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Ajouter une User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46fc"),
  "action_tag_fk": "ADD_US_REL",
  "action_translation_language": "br",
  "action_translation_value": "[REL] Adicionar uma US ao Backlog de Release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46fd"),
  "action_tag_fk": "ADD_US_REL",
  "action_translation_language": "de",
  "action_translation_value": "[REL] User-Story dem Release-Backlog hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46fe"),
  "action_tag_fk": "ADD_US_REL",
  "action_translation_language": "en",
  "action_translation_value": "[REL] Add US to the Release Backlog"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b46ff"),
  "action_tag_fk": "ADD_US_REL",
  "action_translation_language": "es",
  "action_translation_value": "[REL] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4700"),
  "action_tag_fk": "ADD_US_REL",
  "action_translation_language": "fr",
  "action_translation_value": "[REL] Ajouter des US dans le Release Backlog"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4701"),
  "action_tag_fk": "ALLOC_TASK",
  "action_translation_language": "br",
  "action_translation_value": "[TASK] Alocar tarefas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4702"),
  "action_tag_fk": "ALLOC_TASK",
  "action_translation_language": "de",
  "action_translation_value": "[TODO] Aufgaben zuweisen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4703"),
  "action_tag_fk": "ALLOC_TASK",
  "action_translation_language": "en",
  "action_translation_value": "[TSK] Allocate tasks"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4704"),
  "action_tag_fk": "ALLOC_TASK",
  "action_translation_language": "es",
  "action_translation_value": "[TSK] Asignar tareas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4705"),
  "action_tag_fk": "ALLOC_TASK",
  "action_translation_language": "fr",
  "action_translation_value": "[TACHE] Affecter des t"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4706"),
  "action_tag_fk": "DELACTION",
  "action_translation_language": "br",
  "action_translation_value": "[ACT] Deletar uma a"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4707"),
  "action_tag_fk": "DELACTION",
  "action_translation_language": "de",
  "action_translation_value": "[RIS] Aktion l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4708"),
  "action_tag_fk": "DELACTION",
  "action_translation_language": "en",
  "action_translation_value": "[ACT] Delete an action"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4709"),
  "action_tag_fk": "DELACTION",
  "action_translation_language": "es",
  "action_translation_value": "[ACT] Borrar una accion"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b470a"),
  "action_tag_fk": "DELACTION",
  "action_translation_language": "fr",
  "action_translation_value": "[ACT] D"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b470b"),
  "action_tag_fk": "DELPRJ",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Deletar um projeto"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b470c"),
  "action_tag_fk": "DELPRJ",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Projekt l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b470d"),
  "action_tag_fk": "DELPRJ",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Delete a project"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b470e"),
  "action_tag_fk": "DELPRJ",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] Borrar un proyecto"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b470f"),
  "action_tag_fk": "DELPRJ",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] D"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4710"),
  "action_tag_fk": "DELTASK",
  "action_translation_language": "br",
  "action_translation_value": "[TASK] Deletar uma tarefa"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4711"),
  "action_tag_fk": "DELTASK",
  "action_translation_language": "de",
  "action_translation_value": "[TODO] Aufgabe l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4712"),
  "action_tag_fk": "DELTASK",
  "action_translation_language": "en",
  "action_translation_value": "[TASK] Delete a task"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4713"),
  "action_tag_fk": "DELTASK",
  "action_translation_language": "es",
  "action_translation_value": "[TASK] Borrar una tarea"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4714"),
  "action_tag_fk": "DELTASK",
  "action_translation_language": "fr",
  "action_translation_value": "[TACHE] Supprimer une t"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4715"),
  "action_tag_fk": "DEL_ACTIVITIES",
  "action_translation_language": "br",
  "action_translation_value": "[ATV] Deletar uma atividade"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4716"),
  "action_tag_fk": "DEL_ACTIVITIES",
  "action_translation_language": "de",
  "action_translation_value": "[AKT] Aktivit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4717"),
  "action_tag_fk": "DEL_ACTIVITIES",
  "action_translation_language": "en",
  "action_translation_value": "[ATV] Delete an activity"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4718"),
  "action_tag_fk": "DEL_ACTIVITIES",
  "action_translation_language": "es",
  "action_translation_value": "[ATV] Borrar una actividad"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4719"),
  "action_tag_fk": "DEL_ACTIVITIES",
  "action_translation_language": "fr",
  "action_translation_value": "[ATV] Effacer une activit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b471a"),
  "action_tag_fk": "DEL_ISSUES",
  "action_translation_language": "br",
  "action_translation_value": "[ISS] Deletar problemas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b471b"),
  "action_tag_fk": "DEL_ISSUES",
  "action_translation_language": "de",
  "action_translation_value": "[VOR] Vorfall l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b471c"),
  "action_tag_fk": "DEL_ISSUES",
  "action_translation_language": "en",
  "action_translation_value": "[ISS] Delete issues"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b471d"),
  "action_tag_fk": "DEL_ISSUES",
  "action_translation_language": "es",
  "action_translation_value": "[ISS] Borrar un error"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b471e"),
  "action_tag_fk": "DEL_ISSUES",
  "action_translation_language": "fr",
  "action_translation_value": "[OBS] Effacer un obstacle"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b471f"),
  "action_tag_fk": "DEL_RELEASE",
  "action_translation_language": "br",
  "action_translation_value": "[REL] Deletar uma release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4720"),
  "action_tag_fk": "DEL_RELEASE",
  "action_translation_language": "de",
  "action_translation_value": "[REL] Release l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4721"),
  "action_tag_fk": "DEL_RELEASE",
  "action_translation_language": "en",
  "action_translation_value": "[REL] Delete a release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4722"),
  "action_tag_fk": "DEL_RELEASE",
  "action_translation_language": "es",
  "action_translation_value": "[REL] Borrar una release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4723"),
  "action_tag_fk": "DEL_RELEASE",
  "action_translation_language": "fr",
  "action_translation_value": "[REL] D"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4724"),
  "action_tag_fk": "DEL_SPRINT",
  "action_translation_language": "br",
  "action_translation_value": "[SPR] Deletar uma sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4725"),
  "action_tag_fk": "DEL_SPRINT",
  "action_translation_language": "de",
  "action_translation_value": "[SPR] Sprint l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4726"),
  "action_tag_fk": "DEL_SPRINT",
  "action_translation_language": "en",
  "action_translation_value": "[SPR] Delete a sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4727"),
  "action_tag_fk": "DEL_SPRINT",
  "action_translation_language": "es",
  "action_translation_value": "[SPR] Borrar un sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4728"),
  "action_tag_fk": "DEL_SPRINT",
  "action_translation_language": "fr",
  "action_translation_value": "[SPR] D"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4729"),
  "action_tag_fk": "DEL_US",
  "action_translation_language": "br",
  "action_translation_value": "[US] Deletar uma User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b472a"),
  "action_tag_fk": "DEL_US",
  "action_translation_language": "de",
  "action_translation_value": "[US] User-Story l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b472b"),
  "action_tag_fk": "DEL_US",
  "action_translation_language": "en",
  "action_translation_value": "[US] Delete an User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b472c"),
  "action_tag_fk": "DEL_US",
  "action_translation_language": "es",
  "action_translation_value": "[US] Borrar un User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b472d"),
  "action_tag_fk": "DEL_US",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Effacer une User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b472e"),
  "action_tag_fk": "MNGPARAMPRJ",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Gerenciar configura"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b472f"),
  "action_tag_fk": "MNGPARAMPRJ",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Einstellungen verwalten"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4730"),
  "action_tag_fk": "MNGPARAMPRJ",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Manage settings"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4731"),
  "action_tag_fk": "MNGPARAMPRJ",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] Administrar la configuraci"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4732"),
  "action_tag_fk": "MNGPARAMPRJ",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] G"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4733"),
  "action_tag_fk": "MNGSTAKEHOLDER",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Gerenciar stakeholders"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4734"),
  "action_tag_fk": "MNGSTAKEHOLDER",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Stakeholder verwalten"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4735"),
  "action_tag_fk": "MNGSTAKEHOLDER",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Manage stakeholders"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4736"),
  "action_tag_fk": "MNGSTAKEHOLDER",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] Administrar los colaboradores"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4737"),
  "action_tag_fk": "MNGSTAKEHOLDER",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] G"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4738"),
  "action_tag_fk": "MNG_TAGS",
  "action_translation_language": "br",
  "action_translation_value": "[TAGS] Adicionar e deletar tags"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4739"),
  "action_tag_fk": "MNG_TAGS",
  "action_translation_language": "de",
  "action_translation_value": "[TAGS] Tags zu User-Stories und Aufgaben hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b473a"),
  "action_tag_fk": "MNG_TAGS",
  "action_translation_language": "en",
  "action_translation_value": "[TAGS] Add and remove tags on US and tasks"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b473b"),
  "action_tag_fk": "MNG_TAGS",
  "action_translation_language": "es",
  "action_translation_value": "[TAGS] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b473c"),
  "action_tag_fk": "MNG_TAGS",
  "action_translation_language": "fr",
  "action_translation_value": "[TAGS] Ajouter et enlever des tags sur des US et des t"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b473d"),
  "action_tag_fk": "MOVE_ACTION",
  "action_translation_language": "br",
  "action_translation_value": "[ACT] Atualizar status de a"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b473e"),
  "action_tag_fk": "MOVE_ACTION",
  "action_translation_language": "de",
  "action_translation_value": "[RIS] Status einer Aktion "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b473f"),
  "action_tag_fk": "MOVE_ACTION",
  "action_translation_language": "en",
  "action_translation_value": "[ACT] Update actions status"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4740"),
  "action_tag_fk": "MOVE_ACTION",
  "action_translation_language": "es",
  "action_translation_value": "[ACT] Actualizar el estado de las acciones"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4741"),
  "action_tag_fk": "MOVE_ACTION",
  "action_translation_language": "fr",
  "action_translation_value": "[ACT] Changer le statut des actions"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4742"),
  "action_tag_fk": "MOVE_TASK",
  "action_translation_language": "br",
  "action_translation_value": "[TASK] Modificar status da tarefa"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4743"),
  "action_tag_fk": "MOVE_TASK",
  "action_translation_language": "de",
  "action_translation_value": "[TODO] Status einer Aufgabe "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4744"),
  "action_tag_fk": "MOVE_TASK",
  "action_translation_language": "en",
  "action_translation_value": "[TASK] Change task status"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4745"),
  "action_tag_fk": "MOVE_TASK",
  "action_translation_language": "es",
  "action_translation_value": "[TASK] Modificar el estado de las tareas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4746"),
  "action_tag_fk": "MOVE_TASK",
  "action_translation_language": "fr",
  "action_translation_value": "[TACHE] Changer le statut des t"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4747"),
  "action_tag_fk": "MOVE_US",
  "action_translation_language": "br",
  "action_translation_value": "[US] Alocar User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4748"),
  "action_tag_fk": "MOVE_US",
  "action_translation_language": "de",
  "action_translation_value": "[US] User-Story zuweisen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4749"),
  "action_tag_fk": "MOVE_US",
  "action_translation_language": "en",
  "action_translation_value": "[US] Allocate User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b474a"),
  "action_tag_fk": "MOVE_US",
  "action_translation_language": "es",
  "action_translation_value": "[US] Asignar User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b474b"),
  "action_tag_fk": "MOVE_US",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Affecter des User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b474c"),
  "action_tag_fk": "MOV_ACTIVITIES",
  "action_translation_language": "br",
  "action_translation_value": "[ATV] Atualizar status de atividades"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b474d"),
  "action_tag_fk": "MOV_ACTIVITIES",
  "action_translation_language": "de",
  "action_translation_value": "[AKT] Status einer Aktivit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b474e"),
  "action_tag_fk": "MOV_ACTIVITIES",
  "action_translation_language": "en",
  "action_translation_value": "[ATV] Update activity status"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b474f"),
  "action_tag_fk": "MOV_ACTIVITIES",
  "action_translation_language": "es",
  "action_translation_value": "[ATV] Actualizar el estado de una actividad"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4750"),
  "action_tag_fk": "MOV_ACTIVITIES",
  "action_translation_language": "fr",
  "action_translation_value": "[ATV] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4751"),
  "action_tag_fk": "ORDACTION",
  "action_translation_language": "br",
  "action_translation_value": "[ACT] Ordenar a"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4752"),
  "action_tag_fk": "ORDACTION",
  "action_translation_language": "de",
  "action_translation_value": "[RIS] Aktion zuweisen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4753"),
  "action_tag_fk": "ORDACTION",
  "action_translation_language": "en",
  "action_translation_value": "[ACT] Order actions"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4754"),
  "action_tag_fk": "ORDACTION",
  "action_translation_language": "es",
  "action_translation_value": "[ACT] Organizar las acciones"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4755"),
  "action_tag_fk": "ORDACTION",
  "action_translation_language": "fr",
  "action_translation_value": "[ACT] Ordonner les actions"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4756"),
  "action_tag_fk": "ORDTASK",
  "action_translation_language": "br",
  "action_translation_value": "[TASK] Ordenar tarefas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4757"),
  "action_tag_fk": "ORDTASK",
  "action_translation_language": "de",
  "action_translation_value": "[TODO] Aufgabe zuweisen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4758"),
  "action_tag_fk": "ORDTASK",
  "action_translation_language": "en",
  "action_translation_value": "[TASK] Order tasks"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4759"),
  "action_tag_fk": "ORDTASK",
  "action_translation_language": "es",
  "action_translation_value": "[TASK] Organizar las tareas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b475a"),
  "action_tag_fk": "ORDTASK",
  "action_translation_language": "fr",
  "action_translation_value": "[TACHE] Ordonner les t"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b475b"),
  "action_tag_fk": "ORD_ACTIVITIES",
  "action_translation_language": "br",
  "action_translation_value": "[ATV] Ordenar atividades"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b475c"),
  "action_tag_fk": "ORD_ACTIVITIES",
  "action_translation_language": "de",
  "action_translation_value": "[AKT] Aktivit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b475d"),
  "action_tag_fk": "ORD_ACTIVITIES",
  "action_translation_language": "en",
  "action_translation_value": "[ATV] Order activities"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b475e"),
  "action_tag_fk": "ORD_ACTIVITIES",
  "action_translation_language": "es",
  "action_translation_value": "[ATV] Organizar las actividades"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b475f"),
  "action_tag_fk": "ORD_ACTIVITIES",
  "action_translation_language": "fr",
  "action_translation_value": "[ATV] Ordonner les activit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4760"),
  "action_tag_fk": "ORD_ISSUES",
  "action_translation_language": "br",
  "action_translation_value": "[ISS] Ordenar problemas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4761"),
  "action_tag_fk": "ORD_ISSUES",
  "action_translation_language": "de",
  "action_translation_value": "[VOR] Vorfall zuweisen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4762"),
  "action_tag_fk": "ORD_ISSUES",
  "action_translation_language": "en",
  "action_translation_value": "[ISS] Order issues"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4763"),
  "action_tag_fk": "ORD_ISSUES",
  "action_translation_language": "es",
  "action_translation_value": "[ISS] Organizar los errores"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4764"),
  "action_tag_fk": "ORD_ISSUES",
  "action_translation_language": "fr",
  "action_translation_value": "[OBS] Ordonner les obstacles"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4765"),
  "action_tag_fk": "ORD_US",
  "action_translation_language": "br",
  "action_translation_value": "[US] Ordenar User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4766"),
  "action_tag_fk": "ORD_US",
  "action_translation_language": "de",
  "action_translation_value": "[US] User-Story zuweisen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4767"),
  "action_tag_fk": "ORD_US",
  "action_translation_language": "en",
  "action_translation_value": "[US] Order User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4768"),
  "action_tag_fk": "ORD_US",
  "action_translation_language": "es",
  "action_translation_value": "[US] Organizar los User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4769"),
  "action_tag_fk": "ORD_US",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Ordonner les User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b476a"),
  "action_tag_fk": "SET_BV",
  "action_translation_language": "br",
  "action_translation_value": "[US] Definir um business value"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b476b"),
  "action_tag_fk": "SET_BV",
  "action_translation_language": "de",
  "action_translation_value": "[US] Wirtschaftlichen Nutzen festlegen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b476c"),
  "action_tag_fk": "SET_BV",
  "action_translation_language": "en",
  "action_translation_value": "[US] Set a business value"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b476d"),
  "action_tag_fk": "SET_BV",
  "action_translation_language": "es",
  "action_translation_value": "[US] Asigna un business value"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b476e"),
  "action_tag_fk": "SET_BV",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Affecte une business value"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b476f"),
  "action_tag_fk": "SET_COMPLEXITY",
  "action_translation_language": "br",
  "action_translation_value": "[US] Definir uma complexidade"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4770"),
  "action_tag_fk": "SET_COMPLEXITY",
  "action_translation_language": "de",
  "action_translation_value": "[US] Komplexit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4771"),
  "action_tag_fk": "SET_COMPLEXITY",
  "action_translation_language": "en",
  "action_translation_value": "[US] Set a complexity"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4772"),
  "action_tag_fk": "SET_COMPLEXITY",
  "action_translation_language": "es",
  "action_translation_value": "[US] Asigna una complejidad"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4773"),
  "action_tag_fk": "SET_COMPLEXITY",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Affecte une complexit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4774"),
  "action_tag_fk": "SET_IMPACT",
  "action_translation_language": "br",
  "action_translation_value": "[ISS] Definir impacto"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4775"),
  "action_tag_fk": "SET_IMPACT",
  "action_translation_language": "de",
  "action_translation_value": "[VOR] Auswirkung festlegen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4776"),
  "action_tag_fk": "SET_IMPACT",
  "action_translation_language": "en",
  "action_translation_value": "[ISS] Set impact"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4777"),
  "action_tag_fk": "SET_IMPACT",
  "action_translation_language": "es",
  "action_translation_value": "[ISS] Asigna un impacto"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4778"),
  "action_tag_fk": "SET_IMPACT",
  "action_translation_language": "fr",
  "action_translation_value": "[OBS] Affecter un impact"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4779"),
  "action_tag_fk": "UPDACTION",
  "action_translation_language": "br",
  "action_translation_value": "[ACT] Atualizar uma a"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b477a"),
  "action_tag_fk": "UPDACTION",
  "action_translation_language": "de",
  "action_translation_value": "[RIS] Aktion aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b477b"),
  "action_tag_fk": "UPDACTION",
  "action_translation_language": "en",
  "action_translation_value": "[ACT] Update an action"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b477c"),
  "action_tag_fk": "UPDACTION",
  "action_translation_language": "es",
  "action_translation_value": "[ACT] Actualiza una acci"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b477d"),
  "action_tag_fk": "UPDACTION",
  "action_translation_language": "fr",
  "action_translation_value": "[ACT] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b477e"),
  "action_tag_fk": "UPDPRJ",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Atualizar um projeto"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b477f"),
  "action_tag_fk": "UPDPRJ",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Projekt aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4780"),
  "action_tag_fk": "UPDPRJ",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Update a project"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4781"),
  "action_tag_fk": "UPDPRJ",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] Actualiza un proyecto"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4782"),
  "action_tag_fk": "UPDPRJ",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4783"),
  "action_tag_fk": "UPDTASK",
  "action_translation_language": "br",
  "action_translation_value": "[TASK] Atualizar uma tarefa"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4784"),
  "action_tag_fk": "UPDTASK",
  "action_translation_language": "de",
  "action_translation_value": "[TODO] Aufgabe aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4785"),
  "action_tag_fk": "UPDTASK",
  "action_translation_language": "en",
  "action_translation_value": "[TASK] Update a task"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4786"),
  "action_tag_fk": "UPDTASK",
  "action_translation_language": "es",
  "action_translation_value": "[TASK] Actualiza una tarea"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4787"),
  "action_tag_fk": "UPDTASK",
  "action_translation_language": "fr",
  "action_translation_value": "[TACHE] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4788"),
  "action_tag_fk": "UPD_ACTIVITIES",
  "action_translation_language": "br",
  "action_translation_value": "[ATV] Atualizar uma atividade"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4789"),
  "action_tag_fk": "UPD_ACTIVITIES",
  "action_translation_language": "de",
  "action_translation_value": "[AKT] Aktivit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b478a"),
  "action_tag_fk": "UPD_ACTIVITIES",
  "action_translation_language": "en",
  "action_translation_value": "[ATV] Update an activity"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b478b"),
  "action_tag_fk": "UPD_ACTIVITIES",
  "action_translation_language": "es",
  "action_translation_value": "[ATV] Actualiza una actividad"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b478c"),
  "action_tag_fk": "UPD_ACTIVITIES",
  "action_translation_language": "fr",
  "action_translation_value": "[ATV] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b478d"),
  "action_tag_fk": "UPD_ISSUES",
  "action_translation_language": "br",
  "action_translation_value": "[ISS] Atualizar problemas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b478e"),
  "action_tag_fk": "UPD_ISSUES",
  "action_translation_language": "de",
  "action_translation_value": "[VOR] Vorfall aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b478f"),
  "action_tag_fk": "UPD_ISSUES",
  "action_translation_language": "en",
  "action_translation_value": "[ISS] Update issues"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4790"),
  "action_tag_fk": "UPD_ISSUES",
  "action_translation_language": "es",
  "action_translation_value": "[ISS] Actualiza los errores"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4791"),
  "action_tag_fk": "UPD_ISSUES",
  "action_translation_language": "fr",
  "action_translation_value": "[OBS] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4792"),
  "action_tag_fk": "UPD_RELEASE",
  "action_translation_language": "br",
  "action_translation_value": "[REL] Atualizar uma release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4793"),
  "action_tag_fk": "UPD_RELEASE",
  "action_translation_language": "de",
  "action_translation_value": "[REL] Release aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4794"),
  "action_tag_fk": "UPD_RELEASE",
  "action_translation_language": "en",
  "action_translation_value": "[REL] Update a release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4795"),
  "action_tag_fk": "UPD_RELEASE",
  "action_translation_language": "es",
  "action_translation_value": "[REL] Actualiza una release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4796"),
  "action_tag_fk": "UPD_RELEASE",
  "action_translation_language": "fr",
  "action_translation_value": "[REL] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4797"),
  "action_tag_fk": "UPD_SPRINT",
  "action_translation_language": "br",
  "action_translation_value": "[SPR] Atualizar uma sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4798"),
  "action_tag_fk": "UPD_SPRINT",
  "action_translation_language": "de",
  "action_translation_value": "[SPR] Sprint aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4799"),
  "action_tag_fk": "UPD_SPRINT",
  "action_translation_language": "en",
  "action_translation_value": "[SPR] Update a sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b479a"),
  "action_tag_fk": "UPD_SPRINT",
  "action_translation_language": "es",
  "action_translation_value": "[SPR] Actualiza un sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b479b"),
  "action_tag_fk": "UPD_SPRINT",
  "action_translation_language": "fr",
  "action_translation_value": "[SPR] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b479c"),
  "action_tag_fk": "UPD_US",
  "action_translation_language": "br",
  "action_translation_value": "[US] Atualizar uma User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b479d"),
  "action_tag_fk": "UPD_US",
  "action_translation_language": "de",
  "action_translation_value": "[US] User-Story aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b479e"),
  "action_tag_fk": "UPD_US",
  "action_translation_language": "en",
  "action_translation_value": "[US] Update an User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b479f"),
  "action_tag_fk": "UPD_US",
  "action_translation_language": "es",
  "action_translation_value": "[US] Actualiza un User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47a0"),
  "action_tag_fk": "UPD_US",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46c5"),
  "action_tag_fk": "ADDACTION",
  "action_translation_language": "br",
  "action_translation_value": "[ACT] Adicionar uma a"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46c6"),
  "action_tag_fk": "ADDACTION",
  "action_translation_language": "de",
  "action_translation_value": "[RIS] Aktion hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46c7"),
  "action_tag_fk": "ADDACTION",
  "action_translation_language": "en",
  "action_translation_value": "[ACT] Add an action"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46c8"),
  "action_tag_fk": "ADDACTION",
  "action_translation_language": "es",
  "action_translation_value": "[ACT] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46c9"),
  "action_tag_fk": "ADDACTION",
  "action_translation_language": "fr",
  "action_translation_value": "[ACT] Ajouter une action"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ca"),
  "action_tag_fk": "ADDTASK",
  "action_translation_language": "br",
  "action_translation_value": "[TASK] Adicionar tarefas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46cb"),
  "action_tag_fk": "ADDTASK",
  "action_translation_language": "de",
  "action_translation_value": "[TODO] Aufgabe erstellen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46cc"),
  "action_tag_fk": "ADDTASK",
  "action_translation_language": "en",
  "action_translation_value": "[TASK] Add tasks"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46cd"),
  "action_tag_fk": "ADDTASK",
  "action_translation_language": "es",
  "action_translation_value": "[TASK] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ce"),
  "action_tag_fk": "ADDTASK",
  "action_translation_language": "fr",
  "action_translation_value": "[TACHE] Ajouter des t"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46cf"),
  "action_tag_fk": "ADD_ACTIVITY",
  "action_translation_language": "br",
  "action_translation_value": "[ATV] Adicionar uma atividade"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46d0"),
  "action_tag_fk": "ADD_ACTIVITY",
  "action_translation_language": "de",
  "action_translation_value": "[AKT] Aktivit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46d1"),
  "action_tag_fk": "ADD_ACTIVITY",
  "action_translation_language": "en",
  "action_translation_value": "[ATV] Add an activity"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46d2"),
  "action_tag_fk": "ADD_ACTIVITY",
  "action_translation_language": "es",
  "action_translation_value": "[ATV] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46d3"),
  "action_tag_fk": "ADD_ACTIVITY",
  "action_translation_language": "fr",
  "action_translation_value": "[ATV] Ajouter une activit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46d4"),
  "action_tag_fk": "ADD_EXT_PRJ_OTHERS",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Adicionar um projeto externo para outros"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46d5"),
  "action_tag_fk": "ADD_EXT_PRJ_OTHERS",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Externes Projekt f"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46d6"),
  "action_tag_fk": "ADD_EXT_PRJ_OTHERS",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Add an external project for others"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46d7"),
  "action_tag_fk": "ADD_EXT_PRJ_OTHERS",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46d8"),
  "action_tag_fk": "ADD_EXT_PRJ_OTHERS",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] Ajouter un projet externe affect"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46d9"),
  "action_tag_fk": "ADD_EXT_PRJ_SELF",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Adicionar um projeto externo para voc"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46da"),
  "action_tag_fk": "ADD_EXT_PRJ_SELF",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Eigenes externes Projekt hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46db"),
  "action_tag_fk": "ADD_EXT_PRJ_SELF",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Add an external project for oneself"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46e1"),
  "action_tag_fk": "ADD_ISSUES",
  "action_translation_language": "es",
  "action_translation_value": "[ISS] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46dc"),
  "action_tag_fk": "ADD_EXT_PRJ_SELF",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46dd"),
  "action_tag_fk": "ADD_EXT_PRJ_SELF",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] Ajouter un projet externe affect"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46de"),
  "action_tag_fk": "ADD_ISSUES",
  "action_translation_language": "br",
  "action_translation_value": "[ISS] Adicionar problemas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46df"),
  "action_tag_fk": "ADD_ISSUES",
  "action_translation_language": "de",
  "action_translation_value": "[VOR] Vorfall hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46e0"),
  "action_tag_fk": "ADD_ISSUES",
  "action_translation_language": "en",
  "action_translation_value": "[ISS] Add issues"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46e2"),
  "action_tag_fk": "ADD_ISSUES",
  "action_translation_language": "fr",
  "action_translation_value": "[OBS] Enregistrer des obstacles"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46e3"),
  "action_tag_fk": "ADD_PRJ_OTHERS",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Adicionar um projeto para outros"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46e4"),
  "action_tag_fk": "ADD_PRJ_OTHERS",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Projekt f"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46e5"),
  "action_tag_fk": "ADD_PRJ_OTHERS",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Add a project for others"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46e6"),
  "action_tag_fk": "ADD_PRJ_OTHERS",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46e7"),
  "action_tag_fk": "ADD_PRJ_OTHERS",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] Ajouter un projet affect"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46e8"),
  "action_tag_fk": "ADD_PRJ_SELF",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Adicionar um projeto para voc"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46e9"),
  "action_tag_fk": "ADD_PRJ_SELF",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Eigenes Projekt hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ea"),
  "action_tag_fk": "ADD_PRJ_SELF",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Add a project for oneself"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46eb"),
  "action_tag_fk": "ADD_PRJ_SELF",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ec"),
  "action_tag_fk": "ADD_PRJ_SELF",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] Ajouter un projet affect"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ed"),
  "action_tag_fk": "ADD_RELEASE",
  "action_translation_language": "br",
  "action_translation_value": "[REL] Adicionar uma release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ee"),
  "action_tag_fk": "ADD_RELEASE",
  "action_translation_language": "de",
  "action_translation_value": "[REL] Release hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ef"),
  "action_tag_fk": "ADD_RELEASE",
  "action_translation_language": "en",
  "action_translation_value": "[REL] Add a release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46f0"),
  "action_tag_fk": "ADD_RELEASE",
  "action_translation_language": "es",
  "action_translation_value": "[REL] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46f1"),
  "action_tag_fk": "ADD_RELEASE",
  "action_translation_language": "fr",
  "action_translation_value": "[REL] Ajouter une release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46f2"),
  "action_tag_fk": "ADD_SPRINT",
  "action_translation_language": "br",
  "action_translation_value": "[SPR] Adicionar uma sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46f3"),
  "action_tag_fk": "ADD_SPRINT",
  "action_translation_language": "de",
  "action_translation_value": "[SPR] Sprint hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46f4"),
  "action_tag_fk": "ADD_SPRINT",
  "action_translation_language": "en",
  "action_translation_value": "[SPR] Add a sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46f5"),
  "action_tag_fk": "ADD_SPRINT",
  "action_translation_language": "es",
  "action_translation_value": "[SPR] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46f6"),
  "action_tag_fk": "ADD_SPRINT",
  "action_translation_language": "fr",
  "action_translation_value": "[SPR] Ajouter un sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46f7"),
  "action_tag_fk": "ADD_US",
  "action_translation_language": "br",
  "action_translation_value": "[US] Adicionar uma User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46f8"),
  "action_tag_fk": "ADD_US",
  "action_translation_language": "de",
  "action_translation_value": "[US] User-Story anlegen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46f9"),
  "action_tag_fk": "ADD_US",
  "action_translation_language": "en",
  "action_translation_value": "[US] Add an User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46fa"),
  "action_tag_fk": "ADD_US",
  "action_translation_language": "es",
  "action_translation_value": "[US] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46fb"),
  "action_tag_fk": "ADD_US",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Ajouter une User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46fc"),
  "action_tag_fk": "ADD_US_REL",
  "action_translation_language": "br",
  "action_translation_value": "[REL] Adicionar uma US ao Backlog de Release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46fd"),
  "action_tag_fk": "ADD_US_REL",
  "action_translation_language": "de",
  "action_translation_value": "[REL] User-Story dem Release-Backlog hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46fe"),
  "action_tag_fk": "ADD_US_REL",
  "action_translation_language": "en",
  "action_translation_value": "[REL] Add US to the Release Backlog"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b46ff"),
  "action_tag_fk": "ADD_US_REL",
  "action_translation_language": "es",
  "action_translation_value": "[REL] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4700"),
  "action_tag_fk": "ADD_US_REL",
  "action_translation_language": "fr",
  "action_translation_value": "[REL] Ajouter des US dans le Release Backlog"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4701"),
  "action_tag_fk": "ALLOC_TASK",
  "action_translation_language": "br",
  "action_translation_value": "[TASK] Alocar tarefas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4702"),
  "action_tag_fk": "ALLOC_TASK",
  "action_translation_language": "de",
  "action_translation_value": "[TODO] Aufgaben zuweisen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4703"),
  "action_tag_fk": "ALLOC_TASK",
  "action_translation_language": "en",
  "action_translation_value": "[TSK] Allocate tasks"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4704"),
  "action_tag_fk": "ALLOC_TASK",
  "action_translation_language": "es",
  "action_translation_value": "[TSK] Asignar tareas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4705"),
  "action_tag_fk": "ALLOC_TASK",
  "action_translation_language": "fr",
  "action_translation_value": "[TACHE] Affecter des t"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4706"),
  "action_tag_fk": "DELACTION",
  "action_translation_language": "br",
  "action_translation_value": "[ACT] Deletar uma a"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4707"),
  "action_tag_fk": "DELACTION",
  "action_translation_language": "de",
  "action_translation_value": "[RIS] Aktion l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4708"),
  "action_tag_fk": "DELACTION",
  "action_translation_language": "en",
  "action_translation_value": "[ACT] Delete an action"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4709"),
  "action_tag_fk": "DELACTION",
  "action_translation_language": "es",
  "action_translation_value": "[ACT] Borrar una accion"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b470a"),
  "action_tag_fk": "DELACTION",
  "action_translation_language": "fr",
  "action_translation_value": "[ACT] D"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b470b"),
  "action_tag_fk": "DELPRJ",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Deletar um projeto"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b470c"),
  "action_tag_fk": "DELPRJ",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Projekt l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b470d"),
  "action_tag_fk": "DELPRJ",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Delete a project"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b470e"),
  "action_tag_fk": "DELPRJ",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] Borrar un proyecto"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b470f"),
  "action_tag_fk": "DELPRJ",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] D"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4710"),
  "action_tag_fk": "DELTASK",
  "action_translation_language": "br",
  "action_translation_value": "[TASK] Deletar uma tarefa"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4711"),
  "action_tag_fk": "DELTASK",
  "action_translation_language": "de",
  "action_translation_value": "[TODO] Aufgabe l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4712"),
  "action_tag_fk": "DELTASK",
  "action_translation_language": "en",
  "action_translation_value": "[TASK] Delete a task"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4713"),
  "action_tag_fk": "DELTASK",
  "action_translation_language": "es",
  "action_translation_value": "[TASK] Borrar una tarea"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4714"),
  "action_tag_fk": "DELTASK",
  "action_translation_language": "fr",
  "action_translation_value": "[TACHE] Supprimer une t"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4715"),
  "action_tag_fk": "DEL_ACTIVITIES",
  "action_translation_language": "br",
  "action_translation_value": "[ATV] Deletar uma atividade"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4716"),
  "action_tag_fk": "DEL_ACTIVITIES",
  "action_translation_language": "de",
  "action_translation_value": "[AKT] Aktivit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4717"),
  "action_tag_fk": "DEL_ACTIVITIES",
  "action_translation_language": "en",
  "action_translation_value": "[ATV] Delete an activity"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4718"),
  "action_tag_fk": "DEL_ACTIVITIES",
  "action_translation_language": "es",
  "action_translation_value": "[ATV] Borrar una actividad"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4719"),
  "action_tag_fk": "DEL_ACTIVITIES",
  "action_translation_language": "fr",
  "action_translation_value": "[ATV] Effacer une activit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b471a"),
  "action_tag_fk": "DEL_ISSUES",
  "action_translation_language": "br",
  "action_translation_value": "[ISS] Deletar problemas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b471b"),
  "action_tag_fk": "DEL_ISSUES",
  "action_translation_language": "de",
  "action_translation_value": "[VOR] Vorfall l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b471c"),
  "action_tag_fk": "DEL_ISSUES",
  "action_translation_language": "en",
  "action_translation_value": "[ISS] Delete issues"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b471d"),
  "action_tag_fk": "DEL_ISSUES",
  "action_translation_language": "es",
  "action_translation_value": "[ISS] Borrar un error"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b471e"),
  "action_tag_fk": "DEL_ISSUES",
  "action_translation_language": "fr",
  "action_translation_value": "[OBS] Effacer un obstacle"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b471f"),
  "action_tag_fk": "DEL_RELEASE",
  "action_translation_language": "br",
  "action_translation_value": "[REL] Deletar uma release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4720"),
  "action_tag_fk": "DEL_RELEASE",
  "action_translation_language": "de",
  "action_translation_value": "[REL] Release l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4721"),
  "action_tag_fk": "DEL_RELEASE",
  "action_translation_language": "en",
  "action_translation_value": "[REL] Delete a release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4722"),
  "action_tag_fk": "DEL_RELEASE",
  "action_translation_language": "es",
  "action_translation_value": "[REL] Borrar una release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4723"),
  "action_tag_fk": "DEL_RELEASE",
  "action_translation_language": "fr",
  "action_translation_value": "[REL] D"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4724"),
  "action_tag_fk": "DEL_SPRINT",
  "action_translation_language": "br",
  "action_translation_value": "[SPR] Deletar uma sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4725"),
  "action_tag_fk": "DEL_SPRINT",
  "action_translation_language": "de",
  "action_translation_value": "[SPR] Sprint l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4726"),
  "action_tag_fk": "DEL_SPRINT",
  "action_translation_language": "en",
  "action_translation_value": "[SPR] Delete a sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4727"),
  "action_tag_fk": "DEL_SPRINT",
  "action_translation_language": "es",
  "action_translation_value": "[SPR] Borrar un sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4728"),
  "action_tag_fk": "DEL_SPRINT",
  "action_translation_language": "fr",
  "action_translation_value": "[SPR] D"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4729"),
  "action_tag_fk": "DEL_US",
  "action_translation_language": "br",
  "action_translation_value": "[US] Deletar uma User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b472a"),
  "action_tag_fk": "DEL_US",
  "action_translation_language": "de",
  "action_translation_value": "[US] User-Story l"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b472b"),
  "action_tag_fk": "DEL_US",
  "action_translation_language": "en",
  "action_translation_value": "[US] Delete an User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b472c"),
  "action_tag_fk": "DEL_US",
  "action_translation_language": "es",
  "action_translation_value": "[US] Borrar un User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b472d"),
  "action_tag_fk": "DEL_US",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Effacer une User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b472e"),
  "action_tag_fk": "MNGPARAMPRJ",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Gerenciar configura"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b472f"),
  "action_tag_fk": "MNGPARAMPRJ",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Einstellungen verwalten"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4730"),
  "action_tag_fk": "MNGPARAMPRJ",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Manage settings"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4731"),
  "action_tag_fk": "MNGPARAMPRJ",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] Administrar la configuraci"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4732"),
  "action_tag_fk": "MNGPARAMPRJ",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] G"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4733"),
  "action_tag_fk": "MNGSTAKEHOLDER",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Gerenciar stakeholders"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4734"),
  "action_tag_fk": "MNGSTAKEHOLDER",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Stakeholder verwalten"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4735"),
  "action_tag_fk": "MNGSTAKEHOLDER",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Manage stakeholders"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4736"),
  "action_tag_fk": "MNGSTAKEHOLDER",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] Administrar los colaboradores"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4737"),
  "action_tag_fk": "MNGSTAKEHOLDER",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] G"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4738"),
  "action_tag_fk": "MNG_TAGS",
  "action_translation_language": "br",
  "action_translation_value": "[TAGS] Adicionar e deletar tags"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4739"),
  "action_tag_fk": "MNG_TAGS",
  "action_translation_language": "de",
  "action_translation_value": "[TAGS] Tags zu User-Stories und Aufgaben hinzuf"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b473a"),
  "action_tag_fk": "MNG_TAGS",
  "action_translation_language": "en",
  "action_translation_value": "[TAGS] Add and remove tags on US and tasks"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b473b"),
  "action_tag_fk": "MNG_TAGS",
  "action_translation_language": "es",
  "action_translation_value": "[TAGS] A"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b473c"),
  "action_tag_fk": "MNG_TAGS",
  "action_translation_language": "fr",
  "action_translation_value": "[TAGS] Ajouter et enlever des tags sur des US et des t"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b473d"),
  "action_tag_fk": "MOVE_ACTION",
  "action_translation_language": "br",
  "action_translation_value": "[ACT] Atualizar status de a"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b473e"),
  "action_tag_fk": "MOVE_ACTION",
  "action_translation_language": "de",
  "action_translation_value": "[RIS] Status einer Aktion "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b473f"),
  "action_tag_fk": "MOVE_ACTION",
  "action_translation_language": "en",
  "action_translation_value": "[ACT] Update actions status"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4740"),
  "action_tag_fk": "MOVE_ACTION",
  "action_translation_language": "es",
  "action_translation_value": "[ACT] Actualizar el estado de las acciones"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4741"),
  "action_tag_fk": "MOVE_ACTION",
  "action_translation_language": "fr",
  "action_translation_value": "[ACT] Changer le statut des actions"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4742"),
  "action_tag_fk": "MOVE_TASK",
  "action_translation_language": "br",
  "action_translation_value": "[TASK] Modificar status da tarefa"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4743"),
  "action_tag_fk": "MOVE_TASK",
  "action_translation_language": "de",
  "action_translation_value": "[TODO] Status einer Aufgabe "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4744"),
  "action_tag_fk": "MOVE_TASK",
  "action_translation_language": "en",
  "action_translation_value": "[TASK] Change task status"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4745"),
  "action_tag_fk": "MOVE_TASK",
  "action_translation_language": "es",
  "action_translation_value": "[TASK] Modificar el estado de las tareas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4746"),
  "action_tag_fk": "MOVE_TASK",
  "action_translation_language": "fr",
  "action_translation_value": "[TACHE] Changer le statut des t"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4747"),
  "action_tag_fk": "MOVE_US",
  "action_translation_language": "br",
  "action_translation_value": "[US] Alocar User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4748"),
  "action_tag_fk": "MOVE_US",
  "action_translation_language": "de",
  "action_translation_value": "[US] User-Story zuweisen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4749"),
  "action_tag_fk": "MOVE_US",
  "action_translation_language": "en",
  "action_translation_value": "[US] Allocate User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b474a"),
  "action_tag_fk": "MOVE_US",
  "action_translation_language": "es",
  "action_translation_value": "[US] Asignar User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b474b"),
  "action_tag_fk": "MOVE_US",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Affecter des User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b474c"),
  "action_tag_fk": "MOV_ACTIVITIES",
  "action_translation_language": "br",
  "action_translation_value": "[ATV] Atualizar status de atividades"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b474d"),
  "action_tag_fk": "MOV_ACTIVITIES",
  "action_translation_language": "de",
  "action_translation_value": "[AKT] Status einer Aktivit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b474e"),
  "action_tag_fk": "MOV_ACTIVITIES",
  "action_translation_language": "en",
  "action_translation_value": "[ATV] Update activity status"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b474f"),
  "action_tag_fk": "MOV_ACTIVITIES",
  "action_translation_language": "es",
  "action_translation_value": "[ATV] Actualizar el estado de una actividad"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4750"),
  "action_tag_fk": "MOV_ACTIVITIES",
  "action_translation_language": "fr",
  "action_translation_value": "[ATV] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4751"),
  "action_tag_fk": "ORDACTION",
  "action_translation_language": "br",
  "action_translation_value": "[ACT] Ordenar a"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4752"),
  "action_tag_fk": "ORDACTION",
  "action_translation_language": "de",
  "action_translation_value": "[RIS] Aktion zuweisen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4753"),
  "action_tag_fk": "ORDACTION",
  "action_translation_language": "en",
  "action_translation_value": "[ACT] Order actions"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4754"),
  "action_tag_fk": "ORDACTION",
  "action_translation_language": "es",
  "action_translation_value": "[ACT] Organizar las acciones"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4755"),
  "action_tag_fk": "ORDACTION",
  "action_translation_language": "fr",
  "action_translation_value": "[ACT] Ordonner les actions"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4756"),
  "action_tag_fk": "ORDTASK",
  "action_translation_language": "br",
  "action_translation_value": "[TASK] Ordenar tarefas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4757"),
  "action_tag_fk": "ORDTASK",
  "action_translation_language": "de",
  "action_translation_value": "[TODO] Aufgabe zuweisen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4758"),
  "action_tag_fk": "ORDTASK",
  "action_translation_language": "en",
  "action_translation_value": "[TASK] Order tasks"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4759"),
  "action_tag_fk": "ORDTASK",
  "action_translation_language": "es",
  "action_translation_value": "[TASK] Organizar las tareas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b475a"),
  "action_tag_fk": "ORDTASK",
  "action_translation_language": "fr",
  "action_translation_value": "[TACHE] Ordonner les t"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b475b"),
  "action_tag_fk": "ORD_ACTIVITIES",
  "action_translation_language": "br",
  "action_translation_value": "[ATV] Ordenar atividades"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b475c"),
  "action_tag_fk": "ORD_ACTIVITIES",
  "action_translation_language": "de",
  "action_translation_value": "[AKT] Aktivit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b475d"),
  "action_tag_fk": "ORD_ACTIVITIES",
  "action_translation_language": "en",
  "action_translation_value": "[ATV] Order activities"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b475e"),
  "action_tag_fk": "ORD_ACTIVITIES",
  "action_translation_language": "es",
  "action_translation_value": "[ATV] Organizar las actividades"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b475f"),
  "action_tag_fk": "ORD_ACTIVITIES",
  "action_translation_language": "fr",
  "action_translation_value": "[ATV] Ordonner les activit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4760"),
  "action_tag_fk": "ORD_ISSUES",
  "action_translation_language": "br",
  "action_translation_value": "[ISS] Ordenar problemas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4761"),
  "action_tag_fk": "ORD_ISSUES",
  "action_translation_language": "de",
  "action_translation_value": "[VOR] Vorfall zuweisen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4762"),
  "action_tag_fk": "ORD_ISSUES",
  "action_translation_language": "en",
  "action_translation_value": "[ISS] Order issues"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4763"),
  "action_tag_fk": "ORD_ISSUES",
  "action_translation_language": "es",
  "action_translation_value": "[ISS] Organizar los errores"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4764"),
  "action_tag_fk": "ORD_ISSUES",
  "action_translation_language": "fr",
  "action_translation_value": "[OBS] Ordonner les obstacles"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4765"),
  "action_tag_fk": "ORD_US",
  "action_translation_language": "br",
  "action_translation_value": "[US] Ordenar User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4766"),
  "action_tag_fk": "ORD_US",
  "action_translation_language": "de",
  "action_translation_value": "[US] User-Story zuweisen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4767"),
  "action_tag_fk": "ORD_US",
  "action_translation_language": "en",
  "action_translation_value": "[US] Order User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4768"),
  "action_tag_fk": "ORD_US",
  "action_translation_language": "es",
  "action_translation_value": "[US] Organizar los User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4769"),
  "action_tag_fk": "ORD_US",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Ordonner les User Stories"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b476a"),
  "action_tag_fk": "SET_BV",
  "action_translation_language": "br",
  "action_translation_value": "[US] Definir um business value"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b476b"),
  "action_tag_fk": "SET_BV",
  "action_translation_language": "de",
  "action_translation_value": "[US] Wirtschaftlichen Nutzen festlegen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b476c"),
  "action_tag_fk": "SET_BV",
  "action_translation_language": "en",
  "action_translation_value": "[US] Set a business value"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b476d"),
  "action_tag_fk": "SET_BV",
  "action_translation_language": "es",
  "action_translation_value": "[US] Asigna un business value"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b476e"),
  "action_tag_fk": "SET_BV",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Affecte une business value"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b476f"),
  "action_tag_fk": "SET_COMPLEXITY",
  "action_translation_language": "br",
  "action_translation_value": "[US] Definir uma complexidade"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4770"),
  "action_tag_fk": "SET_COMPLEXITY",
  "action_translation_language": "de",
  "action_translation_value": "[US] Komplexit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4771"),
  "action_tag_fk": "SET_COMPLEXITY",
  "action_translation_language": "en",
  "action_translation_value": "[US] Set a complexity"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4772"),
  "action_tag_fk": "SET_COMPLEXITY",
  "action_translation_language": "es",
  "action_translation_value": "[US] Asigna una complejidad"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4773"),
  "action_tag_fk": "SET_COMPLEXITY",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Affecte une complexit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4774"),
  "action_tag_fk": "SET_IMPACT",
  "action_translation_language": "br",
  "action_translation_value": "[ISS] Definir impacto"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4775"),
  "action_tag_fk": "SET_IMPACT",
  "action_translation_language": "de",
  "action_translation_value": "[VOR] Auswirkung festlegen"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4776"),
  "action_tag_fk": "SET_IMPACT",
  "action_translation_language": "en",
  "action_translation_value": "[ISS] Set impact"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4777"),
  "action_tag_fk": "SET_IMPACT",
  "action_translation_language": "es",
  "action_translation_value": "[ISS] Asigna un impacto"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4778"),
  "action_tag_fk": "SET_IMPACT",
  "action_translation_language": "fr",
  "action_translation_value": "[OBS] Affecter un impact"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4779"),
  "action_tag_fk": "UPDACTION",
  "action_translation_language": "br",
  "action_translation_value": "[ACT] Atualizar uma a"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b477a"),
  "action_tag_fk": "UPDACTION",
  "action_translation_language": "de",
  "action_translation_value": "[RIS] Aktion aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b477b"),
  "action_tag_fk": "UPDACTION",
  "action_translation_language": "en",
  "action_translation_value": "[ACT] Update an action"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b477c"),
  "action_tag_fk": "UPDACTION",
  "action_translation_language": "es",
  "action_translation_value": "[ACT] Actualiza una acci"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b477d"),
  "action_tag_fk": "UPDACTION",
  "action_translation_language": "fr",
  "action_translation_value": "[ACT] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b477e"),
  "action_tag_fk": "UPDPRJ",
  "action_translation_language": "br",
  "action_translation_value": "[PRJ] Atualizar um projeto"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b477f"),
  "action_tag_fk": "UPDPRJ",
  "action_translation_language": "de",
  "action_translation_value": "[PRO] Projekt aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4780"),
  "action_tag_fk": "UPDPRJ",
  "action_translation_language": "en",
  "action_translation_value": "[PRJ] Update a project"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4781"),
  "action_tag_fk": "UPDPRJ",
  "action_translation_language": "es",
  "action_translation_value": "[PRJ] Actualiza un proyecto"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4782"),
  "action_tag_fk": "UPDPRJ",
  "action_translation_language": "fr",
  "action_translation_value": "[PRJ] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4783"),
  "action_tag_fk": "UPDTASK",
  "action_translation_language": "br",
  "action_translation_value": "[TASK] Atualizar uma tarefa"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4784"),
  "action_tag_fk": "UPDTASK",
  "action_translation_language": "de",
  "action_translation_value": "[TODO] Aufgabe aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4785"),
  "action_tag_fk": "UPDTASK",
  "action_translation_language": "en",
  "action_translation_value": "[TASK] Update a task"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4786"),
  "action_tag_fk": "UPDTASK",
  "action_translation_language": "es",
  "action_translation_value": "[TASK] Actualiza una tarea"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4787"),
  "action_tag_fk": "UPDTASK",
  "action_translation_language": "fr",
  "action_translation_value": "[TACHE] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4788"),
  "action_tag_fk": "UPD_ACTIVITIES",
  "action_translation_language": "br",
  "action_translation_value": "[ATV] Atualizar uma atividade"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4789"),
  "action_tag_fk": "UPD_ACTIVITIES",
  "action_translation_language": "de",
  "action_translation_value": "[AKT] Aktivit"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b478a"),
  "action_tag_fk": "UPD_ACTIVITIES",
  "action_translation_language": "en",
  "action_translation_value": "[ATV] Update an activity"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b478b"),
  "action_tag_fk": "UPD_ACTIVITIES",
  "action_translation_language": "es",
  "action_translation_value": "[ATV] Actualiza una actividad"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b478c"),
  "action_tag_fk": "UPD_ACTIVITIES",
  "action_translation_language": "fr",
  "action_translation_value": "[ATV] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b478d"),
  "action_tag_fk": "UPD_ISSUES",
  "action_translation_language": "br",
  "action_translation_value": "[ISS] Atualizar problemas"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b478e"),
  "action_tag_fk": "UPD_ISSUES",
  "action_translation_language": "de",
  "action_translation_value": "[VOR] Vorfall aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b478f"),
  "action_tag_fk": "UPD_ISSUES",
  "action_translation_language": "en",
  "action_translation_value": "[ISS] Update issues"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4790"),
  "action_tag_fk": "UPD_ISSUES",
  "action_translation_language": "es",
  "action_translation_value": "[ISS] Actualiza los errores"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4791"),
  "action_tag_fk": "UPD_ISSUES",
  "action_translation_language": "fr",
  "action_translation_value": "[OBS] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4792"),
  "action_tag_fk": "UPD_RELEASE",
  "action_translation_language": "br",
  "action_translation_value": "[REL] Atualizar uma release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4793"),
  "action_tag_fk": "UPD_RELEASE",
  "action_translation_language": "de",
  "action_translation_value": "[REL] Release aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4794"),
  "action_tag_fk": "UPD_RELEASE",
  "action_translation_language": "en",
  "action_translation_value": "[REL] Update a release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4795"),
  "action_tag_fk": "UPD_RELEASE",
  "action_translation_language": "es",
  "action_translation_value": "[REL] Actualiza una release"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4796"),
  "action_tag_fk": "UPD_RELEASE",
  "action_translation_language": "fr",
  "action_translation_value": "[REL] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4797"),
  "action_tag_fk": "UPD_SPRINT",
  "action_translation_language": "br",
  "action_translation_value": "[SPR] Atualizar uma sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4798"),
  "action_tag_fk": "UPD_SPRINT",
  "action_translation_language": "de",
  "action_translation_value": "[SPR] Sprint aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4799"),
  "action_tag_fk": "UPD_SPRINT",
  "action_translation_language": "en",
  "action_translation_value": "[SPR] Update a sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b479a"),
  "action_tag_fk": "UPD_SPRINT",
  "action_translation_language": "es",
  "action_translation_value": "[SPR] Actualiza un sprint"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b479b"),
  "action_tag_fk": "UPD_SPRINT",
  "action_translation_language": "fr",
  "action_translation_value": "[SPR] Mettre "
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b479c"),
  "action_tag_fk": "UPD_US",
  "action_translation_language": "br",
  "action_translation_value": "[US] Atualizar uma User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b479d"),
  "action_tag_fk": "UPD_US",
  "action_translation_language": "de",
  "action_translation_value": "[US] User-Story aktualisieren"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b479e"),
  "action_tag_fk": "UPD_US",
  "action_translation_language": "en",
  "action_translation_value": "[US] Update an User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b479f"),
  "action_tag_fk": "UPD_US",
  "action_translation_language": "es",
  "action_translation_value": "[US] Actualiza un User Story"
});
db.getCollection("framework_profiles_actions_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47a0"),
  "action_tag_fk": "UPD_US",
  "action_translation_language": "fr",
  "action_translation_value": "[US] Mettre "
});

/** framework_profiles_constitution_actions records **/
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47a1"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADDACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47a2"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47a3"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_ACTIVITY"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47a4"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_EXT_PRJ_OTHERS"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47a5"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_EXT_PRJ_SELF"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47a6"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47a7"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_PRJ_OTHERS"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47a8"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_PRJ_SELF"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47a9"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47aa"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ab"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ac"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_US_REL"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ad"),
  "profile_id_fk": "1",
  "action_tag_fk": "ALLOC_TASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ae"),
  "profile_id_fk": "1",
  "action_tag_fk": "DELACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47af"),
  "profile_id_fk": "1",
  "action_tag_fk": "DELPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47b0"),
  "profile_id_fk": "1",
  "action_tag_fk": "DELTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47b1"),
  "profile_id_fk": "1",
  "action_tag_fk": "DEL_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47b2"),
  "profile_id_fk": "1",
  "action_tag_fk": "DEL_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47b3"),
  "profile_id_fk": "1",
  "action_tag_fk": "DEL_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47b4"),
  "profile_id_fk": "1",
  "action_tag_fk": "DEL_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47b5"),
  "profile_id_fk": "1",
  "action_tag_fk": "DEL_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47b6"),
  "profile_id_fk": "1",
  "action_tag_fk": "MNGPARAMPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47b7"),
  "profile_id_fk": "1",
  "action_tag_fk": "MNGSTAKEHOLDER"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47b8"),
  "profile_id_fk": "1",
  "action_tag_fk": "MNG_TAGS"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47b9"),
  "profile_id_fk": "1",
  "action_tag_fk": "MOVE_ACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ba"),
  "profile_id_fk": "1",
  "action_tag_fk": "MOVE_TASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47bb"),
  "profile_id_fk": "1",
  "action_tag_fk": "MOVE_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47bc"),
  "profile_id_fk": "1",
  "action_tag_fk": "MOV_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47bd"),
  "profile_id_fk": "1",
  "action_tag_fk": "ORDACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47be"),
  "profile_id_fk": "1",
  "action_tag_fk": "ORDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47bf"),
  "profile_id_fk": "1",
  "action_tag_fk": "ORD_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47c0"),
  "profile_id_fk": "1",
  "action_tag_fk": "ORD_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47c1"),
  "profile_id_fk": "1",
  "action_tag_fk": "ORD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47c2"),
  "profile_id_fk": "1",
  "action_tag_fk": "SET_BV"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47c3"),
  "profile_id_fk": "1",
  "action_tag_fk": "SET_COMPLEXITY"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47c4"),
  "profile_id_fk": "1",
  "action_tag_fk": "SET_IMPACT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47c5"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPDACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47c6"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPDPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47c7"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47c8"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPD_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47c9"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPD_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ca"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPD_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47cb"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPD_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47cc"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47cd"),
  "profile_id_fk": "2",
  "action_tag_fk": "ADD_PRJ_SELF"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ce"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADDACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47cf"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47d0"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADD_ACTIVITY"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47d1"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADD_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47d2"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADD_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47d3"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADD_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47d4"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47d5"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADD_US_REL"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47d6"),
  "profile_id_fk": "4",
  "action_tag_fk": "ALLOC_TASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47d7"),
  "profile_id_fk": "4",
  "action_tag_fk": "DELACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47d8"),
  "profile_id_fk": "4",
  "action_tag_fk": "DELTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47d9"),
  "profile_id_fk": "4",
  "action_tag_fk": "DEL_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47da"),
  "profile_id_fk": "4",
  "action_tag_fk": "DEL_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47db"),
  "profile_id_fk": "4",
  "action_tag_fk": "DEL_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47dc"),
  "profile_id_fk": "4",
  "action_tag_fk": "DEL_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47dd"),
  "profile_id_fk": "4",
  "action_tag_fk": "MNGPARAMPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47de"),
  "profile_id_fk": "4",
  "action_tag_fk": "MNGSTAKEHOLDER"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47df"),
  "profile_id_fk": "4",
  "action_tag_fk": "MNG_TAGS"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47e0"),
  "profile_id_fk": "4",
  "action_tag_fk": "MOVE_ACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47e1"),
  "profile_id_fk": "4",
  "action_tag_fk": "MOVE_TASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47e2"),
  "profile_id_fk": "4",
  "action_tag_fk": "MOVE_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47e3"),
  "profile_id_fk": "4",
  "action_tag_fk": "MOV_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47e4"),
  "profile_id_fk": "4",
  "action_tag_fk": "ORDACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47e5"),
  "profile_id_fk": "4",
  "action_tag_fk": "ORDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47e6"),
  "profile_id_fk": "4",
  "action_tag_fk": "ORD_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47e7"),
  "profile_id_fk": "4",
  "action_tag_fk": "ORD_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47e8"),
  "profile_id_fk": "4",
  "action_tag_fk": "ORD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47e9"),
  "profile_id_fk": "4",
  "action_tag_fk": "SET_BV"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ea"),
  "profile_id_fk": "4",
  "action_tag_fk": "SET_COMPLEXITY"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47eb"),
  "profile_id_fk": "4",
  "action_tag_fk": "SET_IMPACT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ec"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPDACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ed"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPDPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ee"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ef"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPD_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47f0"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPD_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47f1"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPD_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47f2"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPD_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47f3"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47f4"),
  "profile_id_fk": "6",
  "action_tag_fk": "ADD_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47f5"),
  "profile_id_fk": "6",
  "action_tag_fk": "ADD_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47f6"),
  "profile_id_fk": "6",
  "action_tag_fk": "ADD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47f7"),
  "profile_id_fk": "6",
  "action_tag_fk": "ADD_US_REL"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47f8"),
  "profile_id_fk": "6",
  "action_tag_fk": "DELPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47f9"),
  "profile_id_fk": "6",
  "action_tag_fk": "DEL_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47fa"),
  "profile_id_fk": "6",
  "action_tag_fk": "DEL_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47fb"),
  "profile_id_fk": "6",
  "action_tag_fk": "DEL_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47fc"),
  "profile_id_fk": "6",
  "action_tag_fk": "MNGPARAMPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47fd"),
  "profile_id_fk": "6",
  "action_tag_fk": "MNGSTAKEHOLDER"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47fe"),
  "profile_id_fk": "6",
  "action_tag_fk": "MNG_TAGS"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b47ff"),
  "profile_id_fk": "6",
  "action_tag_fk": "MOVE_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4800"),
  "profile_id_fk": "6",
  "action_tag_fk": "ORD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4801"),
  "profile_id_fk": "6",
  "action_tag_fk": "SET_BV"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4802"),
  "profile_id_fk": "6",
  "action_tag_fk": "UPDPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4803"),
  "profile_id_fk": "6",
  "action_tag_fk": "UPD_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4804"),
  "profile_id_fk": "6",
  "action_tag_fk": "UPD_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4805"),
  "profile_id_fk": "6",
  "action_tag_fk": "UPD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4806"),
  "profile_id_fk": "8",
  "action_tag_fk": "ADDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4807"),
  "profile_id_fk": "8",
  "action_tag_fk": "ALLOC_TASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4808"),
  "profile_id_fk": "8",
  "action_tag_fk": "DELTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4809"),
  "profile_id_fk": "8",
  "action_tag_fk": "MNG_TAGS"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b480a"),
  "profile_id_fk": "8",
  "action_tag_fk": "MOVE_TASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b480b"),
  "profile_id_fk": "8",
  "action_tag_fk": "ORDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b480c"),
  "profile_id_fk": "8",
  "action_tag_fk": "ORD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b480d"),
  "profile_id_fk": "8",
  "action_tag_fk": "SET_COMPLEXITY"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b480e"),
  "profile_id_fk": "8",
  "action_tag_fk": "UPDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47a1"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADDACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47a2"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47a3"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_ACTIVITY"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47a4"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_EXT_PRJ_OTHERS"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47a5"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_EXT_PRJ_SELF"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47a6"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47a7"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_PRJ_OTHERS"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47a8"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_PRJ_SELF"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47a9"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47aa"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ab"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ac"),
  "profile_id_fk": "1",
  "action_tag_fk": "ADD_US_REL"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ad"),
  "profile_id_fk": "1",
  "action_tag_fk": "ALLOC_TASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ae"),
  "profile_id_fk": "1",
  "action_tag_fk": "DELACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47af"),
  "profile_id_fk": "1",
  "action_tag_fk": "DELPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47b0"),
  "profile_id_fk": "1",
  "action_tag_fk": "DELTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47b1"),
  "profile_id_fk": "1",
  "action_tag_fk": "DEL_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47b2"),
  "profile_id_fk": "1",
  "action_tag_fk": "DEL_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47b3"),
  "profile_id_fk": "1",
  "action_tag_fk": "DEL_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47b4"),
  "profile_id_fk": "1",
  "action_tag_fk": "DEL_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47b5"),
  "profile_id_fk": "1",
  "action_tag_fk": "DEL_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47b6"),
  "profile_id_fk": "1",
  "action_tag_fk": "MNGPARAMPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47b7"),
  "profile_id_fk": "1",
  "action_tag_fk": "MNGSTAKEHOLDER"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47b8"),
  "profile_id_fk": "1",
  "action_tag_fk": "MNG_TAGS"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47b9"),
  "profile_id_fk": "1",
  "action_tag_fk": "MOVE_ACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ba"),
  "profile_id_fk": "1",
  "action_tag_fk": "MOVE_TASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47bb"),
  "profile_id_fk": "1",
  "action_tag_fk": "MOVE_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47bc"),
  "profile_id_fk": "1",
  "action_tag_fk": "MOV_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47bd"),
  "profile_id_fk": "1",
  "action_tag_fk": "ORDACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47be"),
  "profile_id_fk": "1",
  "action_tag_fk": "ORDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47bf"),
  "profile_id_fk": "1",
  "action_tag_fk": "ORD_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47c0"),
  "profile_id_fk": "1",
  "action_tag_fk": "ORD_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47c1"),
  "profile_id_fk": "1",
  "action_tag_fk": "ORD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47c2"),
  "profile_id_fk": "1",
  "action_tag_fk": "SET_BV"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47c3"),
  "profile_id_fk": "1",
  "action_tag_fk": "SET_COMPLEXITY"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47c4"),
  "profile_id_fk": "1",
  "action_tag_fk": "SET_IMPACT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47c5"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPDACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47c6"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPDPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47c7"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47c8"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPD_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47c9"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPD_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ca"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPD_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47cb"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPD_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47cc"),
  "profile_id_fk": "1",
  "action_tag_fk": "UPD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47cd"),
  "profile_id_fk": "2",
  "action_tag_fk": "ADD_PRJ_SELF"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ce"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADDACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47cf"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47d0"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADD_ACTIVITY"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47d1"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADD_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47d2"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADD_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47d3"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADD_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47d4"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47d5"),
  "profile_id_fk": "4",
  "action_tag_fk": "ADD_US_REL"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47d6"),
  "profile_id_fk": "4",
  "action_tag_fk": "ALLOC_TASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47d7"),
  "profile_id_fk": "4",
  "action_tag_fk": "DELACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47d8"),
  "profile_id_fk": "4",
  "action_tag_fk": "DELTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47d9"),
  "profile_id_fk": "4",
  "action_tag_fk": "DEL_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47da"),
  "profile_id_fk": "4",
  "action_tag_fk": "DEL_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47db"),
  "profile_id_fk": "4",
  "action_tag_fk": "DEL_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47dc"),
  "profile_id_fk": "4",
  "action_tag_fk": "DEL_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47dd"),
  "profile_id_fk": "4",
  "action_tag_fk": "MNGPARAMPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47de"),
  "profile_id_fk": "4",
  "action_tag_fk": "MNGSTAKEHOLDER"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47df"),
  "profile_id_fk": "4",
  "action_tag_fk": "MNG_TAGS"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47e0"),
  "profile_id_fk": "4",
  "action_tag_fk": "MOVE_ACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47e1"),
  "profile_id_fk": "4",
  "action_tag_fk": "MOVE_TASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47e2"),
  "profile_id_fk": "4",
  "action_tag_fk": "MOVE_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47e3"),
  "profile_id_fk": "4",
  "action_tag_fk": "MOV_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47e4"),
  "profile_id_fk": "4",
  "action_tag_fk": "ORDACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47e5"),
  "profile_id_fk": "4",
  "action_tag_fk": "ORDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47e6"),
  "profile_id_fk": "4",
  "action_tag_fk": "ORD_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47e7"),
  "profile_id_fk": "4",
  "action_tag_fk": "ORD_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47e8"),
  "profile_id_fk": "4",
  "action_tag_fk": "ORD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47e9"),
  "profile_id_fk": "4",
  "action_tag_fk": "SET_BV"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ea"),
  "profile_id_fk": "4",
  "action_tag_fk": "SET_COMPLEXITY"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47eb"),
  "profile_id_fk": "4",
  "action_tag_fk": "SET_IMPACT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ec"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPDACTION"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ed"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPDPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ee"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ef"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPD_ACTIVITIES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47f0"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPD_ISSUES"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47f1"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPD_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47f2"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPD_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47f3"),
  "profile_id_fk": "4",
  "action_tag_fk": "UPD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47f4"),
  "profile_id_fk": "6",
  "action_tag_fk": "ADD_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47f5"),
  "profile_id_fk": "6",
  "action_tag_fk": "ADD_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47f6"),
  "profile_id_fk": "6",
  "action_tag_fk": "ADD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47f7"),
  "profile_id_fk": "6",
  "action_tag_fk": "ADD_US_REL"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47f8"),
  "profile_id_fk": "6",
  "action_tag_fk": "DELPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47f9"),
  "profile_id_fk": "6",
  "action_tag_fk": "DEL_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47fa"),
  "profile_id_fk": "6",
  "action_tag_fk": "DEL_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47fb"),
  "profile_id_fk": "6",
  "action_tag_fk": "DEL_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47fc"),
  "profile_id_fk": "6",
  "action_tag_fk": "MNGPARAMPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47fd"),
  "profile_id_fk": "6",
  "action_tag_fk": "MNGSTAKEHOLDER"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47fe"),
  "profile_id_fk": "6",
  "action_tag_fk": "MNG_TAGS"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b47ff"),
  "profile_id_fk": "6",
  "action_tag_fk": "MOVE_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4800"),
  "profile_id_fk": "6",
  "action_tag_fk": "ORD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4801"),
  "profile_id_fk": "6",
  "action_tag_fk": "SET_BV"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4802"),
  "profile_id_fk": "6",
  "action_tag_fk": "UPDPRJ"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4803"),
  "profile_id_fk": "6",
  "action_tag_fk": "UPD_RELEASE"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4804"),
  "profile_id_fk": "6",
  "action_tag_fk": "UPD_SPRINT"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4805"),
  "profile_id_fk": "6",
  "action_tag_fk": "UPD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4806"),
  "profile_id_fk": "8",
  "action_tag_fk": "ADDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4807"),
  "profile_id_fk": "8",
  "action_tag_fk": "ALLOC_TASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4808"),
  "profile_id_fk": "8",
  "action_tag_fk": "DELTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4809"),
  "profile_id_fk": "8",
  "action_tag_fk": "MNG_TAGS"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b480a"),
  "profile_id_fk": "8",
  "action_tag_fk": "MOVE_TASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b480b"),
  "profile_id_fk": "8",
  "action_tag_fk": "ORDTASK"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b480c"),
  "profile_id_fk": "8",
  "action_tag_fk": "ORD_US"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b480d"),
  "profile_id_fk": "8",
  "action_tag_fk": "SET_COMPLEXITY"
});
db.getCollection("framework_profiles_constitution_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b480e"),
  "profile_id_fk": "8",
  "action_tag_fk": "UPDTASK"
});

/** framework_profiles_constitution_menus records **/
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b480f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4810"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_param"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4811"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4812"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_user"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4813"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_admin"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4814"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4815"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_prj_templates"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4816"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4817"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_tpl_checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4818"),
  "profile_id_fk": "1",
  "menu_tag_fk": "ceremony"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4819"),
  "profile_id_fk": "1",
  "menu_tag_fk": "checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b481a"),
  "profile_id_fk": "1",
  "menu_tag_fk": "cockpit"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b481b"),
  "profile_id_fk": "1",
  "menu_tag_fk": "color_uses"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b481c"),
  "profile_id_fk": "1",
  "menu_tag_fk": "colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b481d"),
  "profile_id_fk": "1",
  "menu_tag_fk": "connections"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b481e"),
  "profile_id_fk": "1",
  "menu_tag_fk": "issue_history"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b481f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "issues"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4820"),
  "profile_id_fk": "1",
  "menu_tag_fk": "languages"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4821"),
  "profile_id_fk": "1",
  "menu_tag_fk": "my_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4822"),
  "profile_id_fk": "1",
  "menu_tag_fk": "poker_plan"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4823"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4824"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4825"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_feature"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4826"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_issues_impact"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4827"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_issues_progress"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4828"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_kanban"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4829"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b482a"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_report"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b482b"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b482c"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b482d"),
  "profile_id_fk": "1",
  "menu_tag_fk": "projects"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b482e"),
  "profile_id_fk": "1",
  "menu_tag_fk": "settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b482f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "team"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4830"),
  "profile_id_fk": "1",
  "menu_tag_fk": "team_tasks"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4831"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_action"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4832"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_issue"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4833"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_tsk"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4834"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_us"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4835"),
  "profile_id_fk": "1",
  "menu_tag_fk": "us_review"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4836"),
  "profile_id_fk": "1",
  "menu_tag_fk": "us_roadmap"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4837"),
  "profile_id_fk": "2",
  "menu_tag_fk": "ceremony"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4838"),
  "profile_id_fk": "2",
  "menu_tag_fk": "checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4839"),
  "profile_id_fk": "2",
  "menu_tag_fk": "cockpit"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b483a"),
  "profile_id_fk": "2",
  "menu_tag_fk": "issue_history"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b483b"),
  "profile_id_fk": "2",
  "menu_tag_fk": "issues"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b483c"),
  "profile_id_fk": "2",
  "menu_tag_fk": "my_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b483d"),
  "profile_id_fk": "2",
  "menu_tag_fk": "poker_plan"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b483e"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b483f"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4840"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_feature"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4841"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_issues_impact"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4842"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_issues_progress"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4843"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_kanban"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4844"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4845"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_report"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4846"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4847"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4848"),
  "profile_id_fk": "2",
  "menu_tag_fk": "projects"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4849"),
  "profile_id_fk": "2",
  "menu_tag_fk": "settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b484a"),
  "profile_id_fk": "2",
  "menu_tag_fk": "team"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b484b"),
  "profile_id_fk": "2",
  "menu_tag_fk": "team_tasks"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b484c"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_action"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b484d"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_issue"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b484e"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_tsk"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b484f"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_us"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4850"),
  "profile_id_fk": "2",
  "menu_tag_fk": "us_review"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4851"),
  "profile_id_fk": "2",
  "menu_tag_fk": "us_roadmap"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4852"),
  "profile_id_fk": "4",
  "menu_tag_fk": "app_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4853"),
  "profile_id_fk": "4",
  "menu_tag_fk": "color_uses"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4854"),
  "profile_id_fk": "4",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478e9c6f05ef708058b4855"),
  "profile_id_fk": "4",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b480f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4810"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_param"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4811"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4812"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_user"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4813"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_admin"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4814"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4815"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_prj_templates"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4816"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4817"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_tpl_checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4818"),
  "profile_id_fk": "1",
  "menu_tag_fk": "ceremony"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4819"),
  "profile_id_fk": "1",
  "menu_tag_fk": "checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b481a"),
  "profile_id_fk": "1",
  "menu_tag_fk": "cockpit"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b481b"),
  "profile_id_fk": "1",
  "menu_tag_fk": "color_uses"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b481c"),
  "profile_id_fk": "1",
  "menu_tag_fk": "colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b481d"),
  "profile_id_fk": "1",
  "menu_tag_fk": "connections"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b481e"),
  "profile_id_fk": "1",
  "menu_tag_fk": "issue_history"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b481f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "issues"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4820"),
  "profile_id_fk": "1",
  "menu_tag_fk": "languages"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4821"),
  "profile_id_fk": "1",
  "menu_tag_fk": "my_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4822"),
  "profile_id_fk": "1",
  "menu_tag_fk": "poker_plan"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4823"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4824"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4825"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_feature"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4826"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_issues_impact"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4827"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_issues_progress"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4828"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_kanban"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4829"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b482a"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_report"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b482b"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b482c"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b482d"),
  "profile_id_fk": "1",
  "menu_tag_fk": "projects"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b482e"),
  "profile_id_fk": "1",
  "menu_tag_fk": "settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b482f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "team"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4830"),
  "profile_id_fk": "1",
  "menu_tag_fk": "team_tasks"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4831"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_action"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4832"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_issue"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4833"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_tsk"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4834"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_us"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4835"),
  "profile_id_fk": "1",
  "menu_tag_fk": "us_review"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4836"),
  "profile_id_fk": "1",
  "menu_tag_fk": "us_roadmap"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4837"),
  "profile_id_fk": "2",
  "menu_tag_fk": "ceremony"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4838"),
  "profile_id_fk": "2",
  "menu_tag_fk": "checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4839"),
  "profile_id_fk": "2",
  "menu_tag_fk": "cockpit"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b483a"),
  "profile_id_fk": "2",
  "menu_tag_fk": "issue_history"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b483b"),
  "profile_id_fk": "2",
  "menu_tag_fk": "issues"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b483c"),
  "profile_id_fk": "2",
  "menu_tag_fk": "my_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b483d"),
  "profile_id_fk": "2",
  "menu_tag_fk": "poker_plan"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b483e"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b483f"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4840"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_feature"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4841"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_issues_impact"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4842"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_issues_progress"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4843"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_kanban"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4844"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4845"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_report"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4846"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4847"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4848"),
  "profile_id_fk": "2",
  "menu_tag_fk": "projects"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4849"),
  "profile_id_fk": "2",
  "menu_tag_fk": "settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b484a"),
  "profile_id_fk": "2",
  "menu_tag_fk": "team"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b484b"),
  "profile_id_fk": "2",
  "menu_tag_fk": "team_tasks"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b484c"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_action"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b484d"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_issue"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b484e"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_tsk"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b484f"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_us"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4850"),
  "profile_id_fk": "2",
  "menu_tag_fk": "us_review"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4851"),
  "profile_id_fk": "2",
  "menu_tag_fk": "us_roadmap"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4852"),
  "profile_id_fk": "4",
  "menu_tag_fk": "app_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4853"),
  "profile_id_fk": "4",
  "menu_tag_fk": "color_uses"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4854"),
  "profile_id_fk": "4",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eab3f05ef784058b4855"),
  "profile_id_fk": "4",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b480f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4810"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_param"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4811"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4812"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_user"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4813"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_admin"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4814"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4815"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_prj_templates"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4816"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4817"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_tpl_checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4818"),
  "profile_id_fk": "1",
  "menu_tag_fk": "ceremony"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4819"),
  "profile_id_fk": "1",
  "menu_tag_fk": "checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b481a"),
  "profile_id_fk": "1",
  "menu_tag_fk": "cockpit"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b481b"),
  "profile_id_fk": "1",
  "menu_tag_fk": "color_uses"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b481c"),
  "profile_id_fk": "1",
  "menu_tag_fk": "colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b481d"),
  "profile_id_fk": "1",
  "menu_tag_fk": "connections"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b481e"),
  "profile_id_fk": "1",
  "menu_tag_fk": "issue_history"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b481f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "issues"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4820"),
  "profile_id_fk": "1",
  "menu_tag_fk": "languages"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4821"),
  "profile_id_fk": "1",
  "menu_tag_fk": "my_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4822"),
  "profile_id_fk": "1",
  "menu_tag_fk": "poker_plan"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4823"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4824"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4825"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_feature"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4826"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_issues_impact"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4827"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_issues_progress"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4828"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_kanban"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4829"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b482a"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_report"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b482b"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b482c"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b482d"),
  "profile_id_fk": "1",
  "menu_tag_fk": "projects"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b482e"),
  "profile_id_fk": "1",
  "menu_tag_fk": "settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b482f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "team"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4830"),
  "profile_id_fk": "1",
  "menu_tag_fk": "team_tasks"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4831"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_action"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4832"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_issue"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4833"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_tsk"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4834"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_us"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4835"),
  "profile_id_fk": "1",
  "menu_tag_fk": "us_review"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4836"),
  "profile_id_fk": "1",
  "menu_tag_fk": "us_roadmap"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4837"),
  "profile_id_fk": "2",
  "menu_tag_fk": "ceremony"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4838"),
  "profile_id_fk": "2",
  "menu_tag_fk": "checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4839"),
  "profile_id_fk": "2",
  "menu_tag_fk": "cockpit"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b483a"),
  "profile_id_fk": "2",
  "menu_tag_fk": "issue_history"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b483b"),
  "profile_id_fk": "2",
  "menu_tag_fk": "issues"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b483c"),
  "profile_id_fk": "2",
  "menu_tag_fk": "my_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b483d"),
  "profile_id_fk": "2",
  "menu_tag_fk": "poker_plan"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b483e"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b483f"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4840"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_feature"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4841"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_issues_impact"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4842"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_issues_progress"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4843"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_kanban"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4844"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4845"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_report"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4846"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4847"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4848"),
  "profile_id_fk": "2",
  "menu_tag_fk": "projects"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4849"),
  "profile_id_fk": "2",
  "menu_tag_fk": "settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b484a"),
  "profile_id_fk": "2",
  "menu_tag_fk": "team"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b484b"),
  "profile_id_fk": "2",
  "menu_tag_fk": "team_tasks"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b484c"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_action"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b484d"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_issue"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b484e"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_tsk"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b484f"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_us"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4850"),
  "profile_id_fk": "2",
  "menu_tag_fk": "us_review"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4851"),
  "profile_id_fk": "2",
  "menu_tag_fk": "us_roadmap"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4852"),
  "profile_id_fk": "4",
  "menu_tag_fk": "app_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4853"),
  "profile_id_fk": "4",
  "menu_tag_fk": "color_uses"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4854"),
  "profile_id_fk": "4",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eacef05ef79b058b4855"),
  "profile_id_fk": "4",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b480f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4810"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_param"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4811"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4812"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_user"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4813"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_admin"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4814"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4815"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_prj_templates"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4816"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4817"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_tpl_checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4818"),
  "profile_id_fk": "1",
  "menu_tag_fk": "ceremony"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4819"),
  "profile_id_fk": "1",
  "menu_tag_fk": "checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b481a"),
  "profile_id_fk": "1",
  "menu_tag_fk": "cockpit"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b481b"),
  "profile_id_fk": "1",
  "menu_tag_fk": "color_uses"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b481c"),
  "profile_id_fk": "1",
  "menu_tag_fk": "colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b481d"),
  "profile_id_fk": "1",
  "menu_tag_fk": "connections"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b481e"),
  "profile_id_fk": "1",
  "menu_tag_fk": "issue_history"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b481f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "issues"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4820"),
  "profile_id_fk": "1",
  "menu_tag_fk": "languages"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4821"),
  "profile_id_fk": "1",
  "menu_tag_fk": "my_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4822"),
  "profile_id_fk": "1",
  "menu_tag_fk": "poker_plan"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4823"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4824"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4825"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_feature"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4826"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_issues_impact"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4827"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_issues_progress"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4828"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_kanban"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4829"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b482a"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_report"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b482b"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b482c"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b482d"),
  "profile_id_fk": "1",
  "menu_tag_fk": "projects"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b482e"),
  "profile_id_fk": "1",
  "menu_tag_fk": "settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b482f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "team"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4830"),
  "profile_id_fk": "1",
  "menu_tag_fk": "team_tasks"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4831"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_action"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4832"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_issue"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4833"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_tsk"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4834"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_us"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4835"),
  "profile_id_fk": "1",
  "menu_tag_fk": "us_review"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4836"),
  "profile_id_fk": "1",
  "menu_tag_fk": "us_roadmap"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4837"),
  "profile_id_fk": "2",
  "menu_tag_fk": "ceremony"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4838"),
  "profile_id_fk": "2",
  "menu_tag_fk": "checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4839"),
  "profile_id_fk": "2",
  "menu_tag_fk": "cockpit"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b483a"),
  "profile_id_fk": "2",
  "menu_tag_fk": "issue_history"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b483b"),
  "profile_id_fk": "2",
  "menu_tag_fk": "issues"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b483c"),
  "profile_id_fk": "2",
  "menu_tag_fk": "my_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b483d"),
  "profile_id_fk": "2",
  "menu_tag_fk": "poker_plan"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b483e"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b483f"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4840"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_feature"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4841"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_issues_impact"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4842"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_issues_progress"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4843"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_kanban"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4844"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4845"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_report"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4846"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4847"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4848"),
  "profile_id_fk": "2",
  "menu_tag_fk": "projects"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4849"),
  "profile_id_fk": "2",
  "menu_tag_fk": "settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b484a"),
  "profile_id_fk": "2",
  "menu_tag_fk": "team"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b484b"),
  "profile_id_fk": "2",
  "menu_tag_fk": "team_tasks"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b484c"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_action"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b484d"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_issue"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b484e"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_tsk"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b484f"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_us"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4850"),
  "profile_id_fk": "2",
  "menu_tag_fk": "us_review"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4851"),
  "profile_id_fk": "2",
  "menu_tag_fk": "us_roadmap"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4852"),
  "profile_id_fk": "4",
  "menu_tag_fk": "app_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4853"),
  "profile_id_fk": "4",
  "menu_tag_fk": "color_uses"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4854"),
  "profile_id_fk": "4",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eb79f05ef7e0058b4855"),
  "profile_id_fk": "4",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b480f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4810"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_param"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4811"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4812"),
  "profile_id_fk": "1",
  "menu_tag_fk": "admin_user"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4813"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_admin"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4814"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4815"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_prj_templates"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4816"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4817"),
  "profile_id_fk": "1",
  "menu_tag_fk": "app_tpl_checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4818"),
  "profile_id_fk": "1",
  "menu_tag_fk": "ceremony"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4819"),
  "profile_id_fk": "1",
  "menu_tag_fk": "checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b481a"),
  "profile_id_fk": "1",
  "menu_tag_fk": "cockpit"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b481b"),
  "profile_id_fk": "1",
  "menu_tag_fk": "color_uses"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b481c"),
  "profile_id_fk": "1",
  "menu_tag_fk": "colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b481d"),
  "profile_id_fk": "1",
  "menu_tag_fk": "connections"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b481e"),
  "profile_id_fk": "1",
  "menu_tag_fk": "issue_history"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b481f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "issues"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4820"),
  "profile_id_fk": "1",
  "menu_tag_fk": "languages"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4821"),
  "profile_id_fk": "1",
  "menu_tag_fk": "my_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4822"),
  "profile_id_fk": "1",
  "menu_tag_fk": "poker_plan"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4823"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4824"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4825"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_feature"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4826"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_issues_impact"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4827"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_issues_progress"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4828"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_kanban"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4829"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b482a"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_report"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b482b"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b482c"),
  "profile_id_fk": "1",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b482d"),
  "profile_id_fk": "1",
  "menu_tag_fk": "projects"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b482e"),
  "profile_id_fk": "1",
  "menu_tag_fk": "settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b482f"),
  "profile_id_fk": "1",
  "menu_tag_fk": "team"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4830"),
  "profile_id_fk": "1",
  "menu_tag_fk": "team_tasks"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4831"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_action"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4832"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_issue"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4833"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_tsk"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4834"),
  "profile_id_fk": "1",
  "menu_tag_fk": "trash_us"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4835"),
  "profile_id_fk": "1",
  "menu_tag_fk": "us_review"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4836"),
  "profile_id_fk": "1",
  "menu_tag_fk": "us_roadmap"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4837"),
  "profile_id_fk": "2",
  "menu_tag_fk": "ceremony"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4838"),
  "profile_id_fk": "2",
  "menu_tag_fk": "checklist"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4839"),
  "profile_id_fk": "2",
  "menu_tag_fk": "cockpit"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b483a"),
  "profile_id_fk": "2",
  "menu_tag_fk": "issue_history"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b483b"),
  "profile_id_fk": "2",
  "menu_tag_fk": "issues"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b483c"),
  "profile_id_fk": "2",
  "menu_tag_fk": "my_profile"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b483d"),
  "profile_id_fk": "2",
  "menu_tag_fk": "poker_plan"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b483e"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_colors"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b483f"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_columns"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4840"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_feature"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4841"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_issues_impact"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4842"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_issues_progress"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4843"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_kanban"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4844"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4845"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_report"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4846"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4847"),
  "profile_id_fk": "2",
  "menu_tag_fk": "prj_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4848"),
  "profile_id_fk": "2",
  "menu_tag_fk": "projects"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4849"),
  "profile_id_fk": "2",
  "menu_tag_fk": "settings"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b484a"),
  "profile_id_fk": "2",
  "menu_tag_fk": "team"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b484b"),
  "profile_id_fk": "2",
  "menu_tag_fk": "team_tasks"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b484c"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_action"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b484d"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_issue"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b484e"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_tsk"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b484f"),
  "profile_id_fk": "2",
  "menu_tag_fk": "trash_us"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4850"),
  "profile_id_fk": "2",
  "menu_tag_fk": "us_review"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4851"),
  "profile_id_fk": "2",
  "menu_tag_fk": "us_roadmap"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4852"),
  "profile_id_fk": "4",
  "menu_tag_fk": "app_tags"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4853"),
  "profile_id_fk": "4",
  "menu_tag_fk": "color_uses"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4854"),
  "profile_id_fk": "4",
  "menu_tag_fk": "prj_parameters"
});
db.getCollection("framework_profiles_constitution_menus").insert({
  "_id": ObjectId("5478eba6f05ef7e3058b4855"),
  "profile_id_fk": "4",
  "menu_tag_fk": "prj_tags"
});

/** framework_status records **/
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4856"),
  "status_id": "1",
  "status_order": "1",
  "status_target_object": "USR",
  "status_delete_available": "0",
  "status_update_available": "1",
  "status_tag": "ACTIVE",
  "status_icon": "set_active.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4857"),
  "status_id": "2",
  "status_order": "2",
  "status_target_object": "USR",
  "status_delete_available": "0",
  "status_update_available": "1",
  "status_tag": "INACT",
  "status_icon": "set_inactive.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4858"),
  "status_id": "5",
  "status_order": "1",
  "status_target_object": "PRJ",
  "status_delete_available": "1",
  "status_update_available": "1",
  "status_tag": "PROJ",
  "status_icon": "new.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4859"),
  "status_id": "6",
  "status_order": "2",
  "status_target_object": "PRJ",
  "status_delete_available": "0",
  "status_update_available": "0",
  "status_tag": "GOING",
  "status_icon": "start.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b485a"),
  "status_id": "7",
  "status_order": "3",
  "status_target_object": "PRJ",
  "status_delete_available": "0",
  "status_update_available": "0",
  "status_tag": "FINISH",
  "status_icon": "finished.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b485b"),
  "status_id": "8",
  "status_order": "4",
  "status_target_object": "PRJ",
  "status_delete_available": "1",
  "status_update_available": "0",
  "status_tag": "CANCEL",
  "status_icon": "trash.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b485c"),
  "status_id": "15",
  "status_order": "5",
  "status_target_object": "PRJ",
  "status_delete_available": "1",
  "status_update_available": "1",
  "status_tag": "BILLED",
  "status_icon": "coins.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b485d"),
  "status_id": "16",
  "status_order": "1",
  "status_target_object": "CON",
  "status_delete_available": "1",
  "status_update_available": "1",
  "status_tag": "INACON",
  "status_icon": "set_inactive.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b485e"),
  "status_id": "17",
  "status_order": "2",
  "status_target_object": "CON",
  "status_delete_available": "0",
  "status_update_available": "0",
  "status_tag": "ACTCON",
  "status_icon": "set_active.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b485f"),
  "status_id": "18",
  "status_order": "1",
  "status_target_object": "COL",
  "status_delete_available": "0",
  "status_update_available": "0",
  "status_tag": "COLINA",
  "status_icon": "set_inactive.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4860"),
  "status_id": "19",
  "status_order": "2",
  "status_target_object": "COL",
  "status_delete_available": "0",
  "status_update_available": "0",
  "status_tag": "COLACT",
  "status_icon": "set_active.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4861"),
  "status_id": "20",
  "status_order": "1",
  "status_target_object": "TAG",
  "status_delete_available": "1",
  "status_update_available": "1",
  "status_tag": "TAGACT",
  "status_icon": "set_active.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4862"),
  "status_id": "21",
  "status_order": "2",
  "status_target_object": "TAG",
  "status_delete_available": "1",
  "status_update_available": "1",
  "status_tag": "TAGINA",
  "status_icon": "set_inactive.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4856"),
  "status_id": "1",
  "status_order": "1",
  "status_target_object": "USR",
  "status_delete_available": "0",
  "status_update_available": "1",
  "status_tag": "ACTIVE",
  "status_icon": "set_active.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4857"),
  "status_id": "2",
  "status_order": "2",
  "status_target_object": "USR",
  "status_delete_available": "0",
  "status_update_available": "1",
  "status_tag": "INACT",
  "status_icon": "set_inactive.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4858"),
  "status_id": "5",
  "status_order": "1",
  "status_target_object": "PRJ",
  "status_delete_available": "1",
  "status_update_available": "1",
  "status_tag": "PROJ",
  "status_icon": "new.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4859"),
  "status_id": "6",
  "status_order": "2",
  "status_target_object": "PRJ",
  "status_delete_available": "0",
  "status_update_available": "0",
  "status_tag": "GOING",
  "status_icon": "start.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b485a"),
  "status_id": "7",
  "status_order": "3",
  "status_target_object": "PRJ",
  "status_delete_available": "0",
  "status_update_available": "0",
  "status_tag": "FINISH",
  "status_icon": "finished.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b485b"),
  "status_id": "8",
  "status_order": "4",
  "status_target_object": "PRJ",
  "status_delete_available": "1",
  "status_update_available": "0",
  "status_tag": "CANCEL",
  "status_icon": "trash.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b485c"),
  "status_id": "15",
  "status_order": "5",
  "status_target_object": "PRJ",
  "status_delete_available": "1",
  "status_update_available": "1",
  "status_tag": "BILLED",
  "status_icon": "coins.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b485d"),
  "status_id": "16",
  "status_order": "1",
  "status_target_object": "CON",
  "status_delete_available": "1",
  "status_update_available": "1",
  "status_tag": "INACON",
  "status_icon": "set_inactive.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b485e"),
  "status_id": "17",
  "status_order": "2",
  "status_target_object": "CON",
  "status_delete_available": "0",
  "status_update_available": "0",
  "status_tag": "ACTCON",
  "status_icon": "set_active.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b485f"),
  "status_id": "18",
  "status_order": "1",
  "status_target_object": "COL",
  "status_delete_available": "0",
  "status_update_available": "0",
  "status_tag": "COLINA",
  "status_icon": "set_inactive.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4860"),
  "status_id": "19",
  "status_order": "2",
  "status_target_object": "COL",
  "status_delete_available": "0",
  "status_update_available": "0",
  "status_tag": "COLACT",
  "status_icon": "set_active.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4861"),
  "status_id": "20",
  "status_order": "1",
  "status_target_object": "TAG",
  "status_delete_available": "1",
  "status_update_available": "1",
  "status_tag": "TAGACT",
  "status_icon": "set_active.gif",
  "status_exclusive_data": "NONE"
});
db.getCollection("framework_status").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4862"),
  "status_id": "21",
  "status_order": "2",
  "status_target_object": "TAG",
  "status_delete_available": "1",
  "status_update_available": "1",
  "status_tag": "TAGINA",
  "status_icon": "set_inactive.gif",
  "status_exclusive_data": "NONE"
});

/** framework_status_translations records **/
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4863"),
  "status_id_fk": "1",
  "status_translation_language": "br",
  "status_translation_value": "Ativo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4864"),
  "status_id_fk": "2",
  "status_translation_language": "br",
  "status_translation_value": "Inativo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4865"),
  "status_id_fk": "5",
  "status_translation_language": "br",
  "status_translation_value": "Novo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4866"),
  "status_id_fk": "6",
  "status_translation_language": "br",
  "status_translation_value": "Iniciado"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4867"),
  "status_id_fk": "7",
  "status_translation_language": "br",
  "status_translation_value": "Terminado"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4868"),
  "status_id_fk": "8",
  "status_translation_language": "br",
  "status_translation_value": "Aguardando"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4869"),
  "status_id_fk": "15",
  "status_translation_language": "br",
  "status_translation_value": "Fechado"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b486a"),
  "status_id_fk": "16",
  "status_translation_language": "br",
  "status_translation_value": "Inativo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b486b"),
  "status_id_fk": "17",
  "status_translation_language": "br",
  "status_translation_value": "Ativo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b486c"),
  "status_id_fk": "18",
  "status_translation_language": "br",
  "status_translation_value": "Indispon"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b486d"),
  "status_id_fk": "19",
  "status_translation_language": "br",
  "status_translation_value": "Dispon"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b486e"),
  "status_id_fk": "20",
  "status_translation_language": "br",
  "status_translation_value": "Dispon"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b486f"),
  "status_id_fk": "21",
  "status_translation_language": "br",
  "status_translation_value": "Indispon"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4870"),
  "status_id_fk": "1",
  "status_translation_language": "de",
  "status_translation_value": "Aktiv"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4871"),
  "status_id_fk": "2",
  "status_translation_language": "de",
  "status_translation_value": "Inaktiv"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4872"),
  "status_id_fk": "5",
  "status_translation_language": "de",
  "status_translation_value": "Neu"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4873"),
  "status_id_fk": "6",
  "status_translation_language": "de",
  "status_translation_value": "Gestartet"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4874"),
  "status_id_fk": "7",
  "status_translation_language": "de",
  "status_translation_value": "Abgeschlossen"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4875"),
  "status_id_fk": "8",
  "status_translation_language": "de",
  "status_translation_value": "Wartend"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4876"),
  "status_id_fk": "15",
  "status_translation_language": "de",
  "status_translation_value": "Beendet"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4877"),
  "status_id_fk": "16",
  "status_translation_language": "de",
  "status_translation_value": "Inaktiv"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4878"),
  "status_id_fk": "17",
  "status_translation_language": "de",
  "status_translation_value": "Aktiv"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4879"),
  "status_id_fk": "18",
  "status_translation_language": "de",
  "status_translation_value": "Nicht verf"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b487a"),
  "status_id_fk": "19",
  "status_translation_language": "de",
  "status_translation_value": "Verf"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b487b"),
  "status_id_fk": "20",
  "status_translation_language": "de",
  "status_translation_value": "Aktiv"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b487c"),
  "status_id_fk": "21",
  "status_translation_language": "de",
  "status_translation_value": "Inaktiv"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b487d"),
  "status_id_fk": "1",
  "status_translation_language": "en",
  "status_translation_value": "Active"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b487e"),
  "status_id_fk": "2",
  "status_translation_language": "en",
  "status_translation_value": "Inactive"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b487f"),
  "status_id_fk": "5",
  "status_translation_language": "en",
  "status_translation_value": "New"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4880"),
  "status_id_fk": "6",
  "status_translation_language": "en",
  "status_translation_value": "Started"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4881"),
  "status_id_fk": "7",
  "status_translation_language": "en",
  "status_translation_value": "Finished"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4882"),
  "status_id_fk": "8",
  "status_translation_language": "en",
  "status_translation_value": "Waiting"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4883"),
  "status_id_fk": "15",
  "status_translation_language": "en",
  "status_translation_value": "Closed"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4884"),
  "status_id_fk": "16",
  "status_translation_language": "en",
  "status_translation_value": "Inactive"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4885"),
  "status_id_fk": "17",
  "status_translation_language": "en",
  "status_translation_value": "Active"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4886"),
  "status_id_fk": "18",
  "status_translation_language": "en",
  "status_translation_value": "Unavailable"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4887"),
  "status_id_fk": "19",
  "status_translation_language": "en",
  "status_translation_value": "Available"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4888"),
  "status_id_fk": "20",
  "status_translation_language": "en",
  "status_translation_value": "Available"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4889"),
  "status_id_fk": "21",
  "status_translation_language": "en",
  "status_translation_value": "Unavailable"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b488a"),
  "status_id_fk": "1",
  "status_translation_language": "es",
  "status_translation_value": "Activo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b488b"),
  "status_id_fk": "2",
  "status_translation_language": "es",
  "status_translation_value": "Inactivo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b488c"),
  "status_id_fk": "5",
  "status_translation_language": "es",
  "status_translation_value": "Nuevo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b488d"),
  "status_id_fk": "6",
  "status_translation_language": "es",
  "status_translation_value": "Empezado"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b488e"),
  "status_id_fk": "7",
  "status_translation_language": "es",
  "status_translation_value": "Terminado"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b488f"),
  "status_id_fk": "8",
  "status_translation_language": "es",
  "status_translation_value": "Esperando"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4890"),
  "status_id_fk": "15",
  "status_translation_language": "es",
  "status_translation_value": "Cerrado"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4891"),
  "status_id_fk": "16",
  "status_translation_language": "es",
  "status_translation_value": "Inactiva"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4892"),
  "status_id_fk": "17",
  "status_translation_language": "es",
  "status_translation_value": "Activa"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4893"),
  "status_id_fk": "18",
  "status_translation_language": "es",
  "status_translation_value": "Indisponible"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4894"),
  "status_id_fk": "19",
  "status_translation_language": "es",
  "status_translation_value": "Disponible"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4895"),
  "status_id_fk": "20",
  "status_translation_language": "es",
  "status_translation_value": "Activo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4896"),
  "status_id_fk": "21",
  "status_translation_language": "es",
  "status_translation_value": "Inactivo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4897"),
  "status_id_fk": "1",
  "status_translation_language": "fr",
  "status_translation_value": "Actif"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4898"),
  "status_id_fk": "2",
  "status_translation_language": "fr",
  "status_translation_value": "Inactif"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4899"),
  "status_id_fk": "5",
  "status_translation_language": "fr",
  "status_translation_value": "Nouveau"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b489a"),
  "status_id_fk": "6",
  "status_translation_language": "fr",
  "status_translation_value": "D"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b489b"),
  "status_id_fk": "7",
  "status_translation_language": "fr",
  "status_translation_value": "Termin"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b489c"),
  "status_id_fk": "8",
  "status_translation_language": "fr",
  "status_translation_value": "Suspendu"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b489d"),
  "status_id_fk": "15",
  "status_translation_language": "fr",
  "status_translation_value": "Ferm"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b489e"),
  "status_id_fk": "16",
  "status_translation_language": "fr",
  "status_translation_value": "Inactive"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b489f"),
  "status_id_fk": "17",
  "status_translation_language": "fr",
  "status_translation_value": "Active"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48a0"),
  "status_id_fk": "18",
  "status_translation_language": "fr",
  "status_translation_value": "Indisponible"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48a1"),
  "status_id_fk": "19",
  "status_translation_language": "fr",
  "status_translation_value": "Disponible"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48a2"),
  "status_id_fk": "20",
  "status_translation_language": "fr",
  "status_translation_value": "Actif"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48a3"),
  "status_id_fk": "21",
  "status_translation_language": "fr",
  "status_translation_value": "Inactif"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4863"),
  "status_id_fk": "1",
  "status_translation_language": "br",
  "status_translation_value": "Ativo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4864"),
  "status_id_fk": "2",
  "status_translation_language": "br",
  "status_translation_value": "Inativo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4865"),
  "status_id_fk": "5",
  "status_translation_language": "br",
  "status_translation_value": "Novo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4866"),
  "status_id_fk": "6",
  "status_translation_language": "br",
  "status_translation_value": "Iniciado"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4867"),
  "status_id_fk": "7",
  "status_translation_language": "br",
  "status_translation_value": "Terminado"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4868"),
  "status_id_fk": "8",
  "status_translation_language": "br",
  "status_translation_value": "Aguardando"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4869"),
  "status_id_fk": "15",
  "status_translation_language": "br",
  "status_translation_value": "Fechado"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b486a"),
  "status_id_fk": "16",
  "status_translation_language": "br",
  "status_translation_value": "Inativo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b486b"),
  "status_id_fk": "17",
  "status_translation_language": "br",
  "status_translation_value": "Ativo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b486c"),
  "status_id_fk": "18",
  "status_translation_language": "br",
  "status_translation_value": "Indispon"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b486d"),
  "status_id_fk": "19",
  "status_translation_language": "br",
  "status_translation_value": "Dispon"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b486e"),
  "status_id_fk": "20",
  "status_translation_language": "br",
  "status_translation_value": "Dispon"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b486f"),
  "status_id_fk": "21",
  "status_translation_language": "br",
  "status_translation_value": "Indispon"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4870"),
  "status_id_fk": "1",
  "status_translation_language": "de",
  "status_translation_value": "Aktiv"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4871"),
  "status_id_fk": "2",
  "status_translation_language": "de",
  "status_translation_value": "Inaktiv"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4872"),
  "status_id_fk": "5",
  "status_translation_language": "de",
  "status_translation_value": "Neu"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4873"),
  "status_id_fk": "6",
  "status_translation_language": "de",
  "status_translation_value": "Gestartet"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4874"),
  "status_id_fk": "7",
  "status_translation_language": "de",
  "status_translation_value": "Abgeschlossen"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4875"),
  "status_id_fk": "8",
  "status_translation_language": "de",
  "status_translation_value": "Wartend"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4876"),
  "status_id_fk": "15",
  "status_translation_language": "de",
  "status_translation_value": "Beendet"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4877"),
  "status_id_fk": "16",
  "status_translation_language": "de",
  "status_translation_value": "Inaktiv"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4878"),
  "status_id_fk": "17",
  "status_translation_language": "de",
  "status_translation_value": "Aktiv"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4879"),
  "status_id_fk": "18",
  "status_translation_language": "de",
  "status_translation_value": "Nicht verf"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b487a"),
  "status_id_fk": "19",
  "status_translation_language": "de",
  "status_translation_value": "Verf"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b487b"),
  "status_id_fk": "20",
  "status_translation_language": "de",
  "status_translation_value": "Aktiv"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b487c"),
  "status_id_fk": "21",
  "status_translation_language": "de",
  "status_translation_value": "Inaktiv"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b487d"),
  "status_id_fk": "1",
  "status_translation_language": "en",
  "status_translation_value": "Active"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b487e"),
  "status_id_fk": "2",
  "status_translation_language": "en",
  "status_translation_value": "Inactive"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b487f"),
  "status_id_fk": "5",
  "status_translation_language": "en",
  "status_translation_value": "New"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4880"),
  "status_id_fk": "6",
  "status_translation_language": "en",
  "status_translation_value": "Started"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4881"),
  "status_id_fk": "7",
  "status_translation_language": "en",
  "status_translation_value": "Finished"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4882"),
  "status_id_fk": "8",
  "status_translation_language": "en",
  "status_translation_value": "Waiting"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4883"),
  "status_id_fk": "15",
  "status_translation_language": "en",
  "status_translation_value": "Closed"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4884"),
  "status_id_fk": "16",
  "status_translation_language": "en",
  "status_translation_value": "Inactive"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4885"),
  "status_id_fk": "17",
  "status_translation_language": "en",
  "status_translation_value": "Active"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4886"),
  "status_id_fk": "18",
  "status_translation_language": "en",
  "status_translation_value": "Unavailable"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4887"),
  "status_id_fk": "19",
  "status_translation_language": "en",
  "status_translation_value": "Available"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4888"),
  "status_id_fk": "20",
  "status_translation_language": "en",
  "status_translation_value": "Available"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4889"),
  "status_id_fk": "21",
  "status_translation_language": "en",
  "status_translation_value": "Unavailable"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b488a"),
  "status_id_fk": "1",
  "status_translation_language": "es",
  "status_translation_value": "Activo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b488b"),
  "status_id_fk": "2",
  "status_translation_language": "es",
  "status_translation_value": "Inactivo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b488c"),
  "status_id_fk": "5",
  "status_translation_language": "es",
  "status_translation_value": "Nuevo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b488d"),
  "status_id_fk": "6",
  "status_translation_language": "es",
  "status_translation_value": "Empezado"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b488e"),
  "status_id_fk": "7",
  "status_translation_language": "es",
  "status_translation_value": "Terminado"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b488f"),
  "status_id_fk": "8",
  "status_translation_language": "es",
  "status_translation_value": "Esperando"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4890"),
  "status_id_fk": "15",
  "status_translation_language": "es",
  "status_translation_value": "Cerrado"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4891"),
  "status_id_fk": "16",
  "status_translation_language": "es",
  "status_translation_value": "Inactiva"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4892"),
  "status_id_fk": "17",
  "status_translation_language": "es",
  "status_translation_value": "Activa"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4893"),
  "status_id_fk": "18",
  "status_translation_language": "es",
  "status_translation_value": "Indisponible"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4894"),
  "status_id_fk": "19",
  "status_translation_language": "es",
  "status_translation_value": "Disponible"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4895"),
  "status_id_fk": "20",
  "status_translation_language": "es",
  "status_translation_value": "Activo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4896"),
  "status_id_fk": "21",
  "status_translation_language": "es",
  "status_translation_value": "Inactivo"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4897"),
  "status_id_fk": "1",
  "status_translation_language": "fr",
  "status_translation_value": "Actif"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4898"),
  "status_id_fk": "2",
  "status_translation_language": "fr",
  "status_translation_value": "Inactif"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4899"),
  "status_id_fk": "5",
  "status_translation_language": "fr",
  "status_translation_value": "Nouveau"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b489a"),
  "status_id_fk": "6",
  "status_translation_language": "fr",
  "status_translation_value": "D"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b489b"),
  "status_id_fk": "7",
  "status_translation_language": "fr",
  "status_translation_value": "Termin"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b489c"),
  "status_id_fk": "8",
  "status_translation_language": "fr",
  "status_translation_value": "Suspendu"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b489d"),
  "status_id_fk": "15",
  "status_translation_language": "fr",
  "status_translation_value": "Ferm"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b489e"),
  "status_id_fk": "16",
  "status_translation_language": "fr",
  "status_translation_value": "Inactive"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b489f"),
  "status_id_fk": "17",
  "status_translation_language": "fr",
  "status_translation_value": "Active"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48a0"),
  "status_id_fk": "18",
  "status_translation_language": "fr",
  "status_translation_value": "Indisponible"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48a1"),
  "status_id_fk": "19",
  "status_translation_language": "fr",
  "status_translation_value": "Disponible"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48a2"),
  "status_id_fk": "20",
  "status_translation_language": "fr",
  "status_translation_value": "Actif"
});
db.getCollection("framework_status_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48a3"),
  "status_id_fk": "21",
  "status_translation_language": "fr",
  "status_translation_value": "Inactif"
});

/** framework_users records **/
db.getCollection("framework_users").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48a4"),
  "user_address_id_fk": "0",
  "user_connection_mode": "LOCAL",
  "user_creation_date": "2010-01-01",
  "user_firstname": "Mister",
  "user_language": "en",
  "user_login": "admin",
  "user_mail": "admin@localhost.com",
  "user_name": "Administrator",
  "user_password": "21232f297a57a5a743894a0e4a801fc3",
  "user_profile_id_fk": {
    "$ref": "framework_profiles",
    "$id": ObjectId("5463b245f05ef7e0188b4693"),
    "$db": "kados"
  },
  "user_status_id_fk": "1",
  "user_theme": "default2014"
});
db.getCollection("framework_users").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48a4"),
  "user_login": "admin",
  "user_name": "Administrator",
  "user_firstname": "Mister",
  "user_mail": "admin@localhost.com",
  "user_password": "21232f297a57a5a743894a0e4a801fc3",
  "user_profile_id_fk": "1",
  "user_address_id_fk": "0",
  "user_creation_date": "2010-01-01",
  "user_status_id_fk": "1",
  "user_connection_mode": "LOCAL",
  "user_language": "en",
  "user_theme": "default2014"
});

/** framework_workflows records **/
db.getCollection("framework_workflows").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48a5"),
  "wf_id": "1",
  "wf_tag": "USR",
  "wf_initial_status_id": "1",
  "wf_objects_table": "framework_users",
  "wf_object_id_field": "user_login",
  "wf_object_status_id_field": "user_status_id_fk",
  "wf_favorite_profile_id_fk": "0"
});
db.getCollection("framework_workflows").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48a6"),
  "wf_id": "5",
  "wf_tag": "PRJ",
  "wf_initial_status_id": "5",
  "wf_objects_table": "kados_projects",
  "wf_object_id_field": "project_id",
  "wf_object_status_id_field": "project_status_id_fk",
  "wf_favorite_profile_id_fk": "0"
});
db.getCollection("framework_workflows").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48a7"),
  "wf_id": "6",
  "wf_tag": "CON",
  "wf_initial_status_id": "16",
  "wf_objects_table": "kados_connections",
  "wf_object_id_field": "connection_id",
  "wf_object_status_id_field": "connection_status_id_fk",
  "wf_favorite_profile_id_fk": "0"
});
db.getCollection("framework_workflows").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48a8"),
  "wf_id": "7",
  "wf_tag": "COL",
  "wf_initial_status_id": "18",
  "wf_objects_table": "kados_template_columns",
  "wf_object_id_field": "column_tag",
  "wf_object_status_id_field": "column_status_id_fk",
  "wf_favorite_profile_id_fk": "0"
});
db.getCollection("framework_workflows").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48a9"),
  "wf_id": "8",
  "wf_tag": "TAG",
  "wf_initial_status_id": "20",
  "wf_objects_table": "kados_tags",
  "wf_object_id_field": "tag_id",
  "wf_object_status_id_field": "tag_status_id_fk",
  "wf_favorite_profile_id_fk": "0"
});
db.getCollection("framework_workflows").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48a5"),
  "wf_id": "1",
  "wf_tag": "USR",
  "wf_initial_status_id": "1",
  "wf_objects_table": "framework_users",
  "wf_object_id_field": "user_login",
  "wf_object_status_id_field": "user_status_id_fk",
  "wf_favorite_profile_id_fk": "0"
});
db.getCollection("framework_workflows").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48a6"),
  "wf_id": "5",
  "wf_tag": "PRJ",
  "wf_initial_status_id": "5",
  "wf_objects_table": "kados_projects",
  "wf_object_id_field": "project_id",
  "wf_object_status_id_field": "project_status_id_fk",
  "wf_favorite_profile_id_fk": "0"
});
db.getCollection("framework_workflows").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48a7"),
  "wf_id": "6",
  "wf_tag": "CON",
  "wf_initial_status_id": "16",
  "wf_objects_table": "kados_connections",
  "wf_object_id_field": "connection_id",
  "wf_object_status_id_field": "connection_status_id_fk",
  "wf_favorite_profile_id_fk": "0"
});
db.getCollection("framework_workflows").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48a8"),
  "wf_id": "7",
  "wf_tag": "COL",
  "wf_initial_status_id": "18",
  "wf_objects_table": "kados_template_columns",
  "wf_object_id_field": "column_tag",
  "wf_object_status_id_field": "column_status_id_fk",
  "wf_favorite_profile_id_fk": "0"
});
db.getCollection("framework_workflows").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48a9"),
  "wf_id": "8",
  "wf_tag": "TAG",
  "wf_initial_status_id": "20",
  "wf_objects_table": "kados_tags",
  "wf_object_id_field": "tag_id",
  "wf_object_status_id_field": "tag_status_id_fk",
  "wf_favorite_profile_id_fk": "0"
});

/** framework_workflows_transitions records **/
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48aa"),
  "transition_id": "1",
  "transition_wf_id_fk": "1",
  "transition_initial_status": "1",
  "transition_final_status": "2"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ab"),
  "transition_id": "2",
  "transition_wf_id_fk": "1",
  "transition_initial_status": "2",
  "transition_final_status": "1"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ac"),
  "transition_id": "35",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "5",
  "transition_final_status": "6"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ad"),
  "transition_id": "36",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "5",
  "transition_final_status": "7"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ae"),
  "transition_id": "37",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "5",
  "transition_final_status": "8"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48af"),
  "transition_id": "38",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "5",
  "transition_final_status": "15"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48b0"),
  "transition_id": "39",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "6",
  "transition_final_status": "7"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48b1"),
  "transition_id": "40",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "6",
  "transition_final_status": "8"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48b2"),
  "transition_id": "41",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "6",
  "transition_final_status": "15"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48b3"),
  "transition_id": "42",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "7",
  "transition_final_status": "6"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48b4"),
  "transition_id": "43",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "7",
  "transition_final_status": "8"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48b5"),
  "transition_id": "44",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "7",
  "transition_final_status": "15"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48b6"),
  "transition_id": "45",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "8",
  "transition_final_status": "7"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48b7"),
  "transition_id": "46",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "8",
  "transition_final_status": "6"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48b8"),
  "transition_id": "47",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "8",
  "transition_final_status": "15"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48b9"),
  "transition_id": "48",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "15",
  "transition_final_status": "6"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ba"),
  "transition_id": "49",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "15",
  "transition_final_status": "7"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48bb"),
  "transition_id": "50",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "15",
  "transition_final_status": "8"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48bc"),
  "transition_id": "51",
  "transition_wf_id_fk": "6",
  "transition_initial_status": "16",
  "transition_final_status": "17"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48bd"),
  "transition_id": "52",
  "transition_wf_id_fk": "6",
  "transition_initial_status": "17",
  "transition_final_status": "16"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48be"),
  "transition_id": "53",
  "transition_wf_id_fk": "7",
  "transition_initial_status": "18",
  "transition_final_status": "19"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48bf"),
  "transition_id": "54",
  "transition_wf_id_fk": "7",
  "transition_initial_status": "19",
  "transition_final_status": "18"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48c0"),
  "transition_id": "55",
  "transition_wf_id_fk": "8",
  "transition_initial_status": "20",
  "transition_final_status": "21"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48c1"),
  "transition_id": "56",
  "transition_wf_id_fk": "8",
  "transition_initial_status": "21",
  "transition_final_status": "20"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48aa"),
  "transition_id": "1",
  "transition_wf_id_fk": "1",
  "transition_initial_status": "1",
  "transition_final_status": "2"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ab"),
  "transition_id": "2",
  "transition_wf_id_fk": "1",
  "transition_initial_status": "2",
  "transition_final_status": "1"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ac"),
  "transition_id": "35",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "5",
  "transition_final_status": "6"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ad"),
  "transition_id": "36",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "5",
  "transition_final_status": "7"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ae"),
  "transition_id": "37",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "5",
  "transition_final_status": "8"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48af"),
  "transition_id": "38",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "5",
  "transition_final_status": "15"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48b0"),
  "transition_id": "39",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "6",
  "transition_final_status": "7"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48b1"),
  "transition_id": "40",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "6",
  "transition_final_status": "8"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48b2"),
  "transition_id": "41",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "6",
  "transition_final_status": "15"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48b3"),
  "transition_id": "42",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "7",
  "transition_final_status": "6"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48b4"),
  "transition_id": "43",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "7",
  "transition_final_status": "8"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48b5"),
  "transition_id": "44",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "7",
  "transition_final_status": "15"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48b6"),
  "transition_id": "45",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "8",
  "transition_final_status": "7"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48b7"),
  "transition_id": "46",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "8",
  "transition_final_status": "6"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48b8"),
  "transition_id": "47",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "8",
  "transition_final_status": "15"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48b9"),
  "transition_id": "48",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "15",
  "transition_final_status": "6"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ba"),
  "transition_id": "49",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "15",
  "transition_final_status": "7"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48bb"),
  "transition_id": "50",
  "transition_wf_id_fk": "5",
  "transition_initial_status": "15",
  "transition_final_status": "8"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48bc"),
  "transition_id": "51",
  "transition_wf_id_fk": "6",
  "transition_initial_status": "16",
  "transition_final_status": "17"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48bd"),
  "transition_id": "52",
  "transition_wf_id_fk": "6",
  "transition_initial_status": "17",
  "transition_final_status": "16"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48be"),
  "transition_id": "53",
  "transition_wf_id_fk": "7",
  "transition_initial_status": "18",
  "transition_final_status": "19"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48bf"),
  "transition_id": "54",
  "transition_wf_id_fk": "7",
  "transition_initial_status": "19",
  "transition_final_status": "18"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48c0"),
  "transition_id": "55",
  "transition_wf_id_fk": "8",
  "transition_initial_status": "20",
  "transition_final_status": "21"
});
db.getCollection("framework_workflows_transitions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48c1"),
  "transition_id": "56",
  "transition_wf_id_fk": "8",
  "transition_initial_status": "21",
  "transition_final_status": "20"
});

/** framework_workflows_transitions_profiles records **/
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48c2"),
  "profile_id_fk": "1",
  "transition_id_fk": "1"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48c3"),
  "profile_id_fk": "1",
  "transition_id_fk": "2"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48c4"),
  "profile_id_fk": "1",
  "transition_id_fk": "3"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48c5"),
  "profile_id_fk": "1",
  "transition_id_fk": "4"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48c6"),
  "profile_id_fk": "1",
  "transition_id_fk": "5"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48c7"),
  "profile_id_fk": "1",
  "transition_id_fk": "6"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48c8"),
  "profile_id_fk": "1",
  "transition_id_fk": "35"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48c9"),
  "profile_id_fk": "1",
  "transition_id_fk": "36"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ca"),
  "profile_id_fk": "1",
  "transition_id_fk": "37"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48cb"),
  "profile_id_fk": "1",
  "transition_id_fk": "38"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48cc"),
  "profile_id_fk": "1",
  "transition_id_fk": "39"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48cd"),
  "profile_id_fk": "1",
  "transition_id_fk": "40"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ce"),
  "profile_id_fk": "1",
  "transition_id_fk": "41"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48cf"),
  "profile_id_fk": "1",
  "transition_id_fk": "42"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48d0"),
  "profile_id_fk": "1",
  "transition_id_fk": "43"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48d1"),
  "profile_id_fk": "1",
  "transition_id_fk": "44"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48d2"),
  "profile_id_fk": "1",
  "transition_id_fk": "45"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48d3"),
  "profile_id_fk": "1",
  "transition_id_fk": "46"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48d4"),
  "profile_id_fk": "1",
  "transition_id_fk": "47"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48d5"),
  "profile_id_fk": "1",
  "transition_id_fk": "48"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48d6"),
  "profile_id_fk": "1",
  "transition_id_fk": "49"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48d7"),
  "profile_id_fk": "1",
  "transition_id_fk": "50"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48d8"),
  "profile_id_fk": "1",
  "transition_id_fk": "51"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48d9"),
  "profile_id_fk": "1",
  "transition_id_fk": "52"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48da"),
  "profile_id_fk": "1",
  "transition_id_fk": "53"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48db"),
  "profile_id_fk": "1",
  "transition_id_fk": "54"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48dc"),
  "profile_id_fk": "1",
  "transition_id_fk": "55"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48dd"),
  "profile_id_fk": "1",
  "transition_id_fk": "56"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48de"),
  "profile_id_fk": "4",
  "transition_id_fk": "55"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48df"),
  "profile_id_fk": "4",
  "transition_id_fk": "56"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48e0"),
  "profile_id_fk": "6",
  "transition_id_fk": "35"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48e1"),
  "profile_id_fk": "6",
  "transition_id_fk": "39"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48e2"),
  "profile_id_fk": "6",
  "transition_id_fk": "40"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48e3"),
  "profile_id_fk": "6",
  "transition_id_fk": "44"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48e4"),
  "profile_id_fk": "6",
  "transition_id_fk": "45"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48e5"),
  "profile_id_fk": "6",
  "transition_id_fk": "46"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48e6"),
  "profile_id_fk": "6",
  "transition_id_fk": "48"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48c2"),
  "profile_id_fk": "1",
  "transition_id_fk": "1"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48c3"),
  "profile_id_fk": "1",
  "transition_id_fk": "2"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48c4"),
  "profile_id_fk": "1",
  "transition_id_fk": "3"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48c5"),
  "profile_id_fk": "1",
  "transition_id_fk": "4"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48c6"),
  "profile_id_fk": "1",
  "transition_id_fk": "5"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48c7"),
  "profile_id_fk": "1",
  "transition_id_fk": "6"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48c8"),
  "profile_id_fk": "1",
  "transition_id_fk": "35"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48c9"),
  "profile_id_fk": "1",
  "transition_id_fk": "36"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ca"),
  "profile_id_fk": "1",
  "transition_id_fk": "37"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48cb"),
  "profile_id_fk": "1",
  "transition_id_fk": "38"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48cc"),
  "profile_id_fk": "1",
  "transition_id_fk": "39"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48cd"),
  "profile_id_fk": "1",
  "transition_id_fk": "40"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ce"),
  "profile_id_fk": "1",
  "transition_id_fk": "41"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48cf"),
  "profile_id_fk": "1",
  "transition_id_fk": "42"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48d0"),
  "profile_id_fk": "1",
  "transition_id_fk": "43"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48d1"),
  "profile_id_fk": "1",
  "transition_id_fk": "44"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48d2"),
  "profile_id_fk": "1",
  "transition_id_fk": "45"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48d3"),
  "profile_id_fk": "1",
  "transition_id_fk": "46"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48d4"),
  "profile_id_fk": "1",
  "transition_id_fk": "47"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48d5"),
  "profile_id_fk": "1",
  "transition_id_fk": "48"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48d6"),
  "profile_id_fk": "1",
  "transition_id_fk": "49"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48d7"),
  "profile_id_fk": "1",
  "transition_id_fk": "50"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48d8"),
  "profile_id_fk": "1",
  "transition_id_fk": "51"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48d9"),
  "profile_id_fk": "1",
  "transition_id_fk": "52"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48da"),
  "profile_id_fk": "1",
  "transition_id_fk": "53"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48db"),
  "profile_id_fk": "1",
  "transition_id_fk": "54"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48dc"),
  "profile_id_fk": "1",
  "transition_id_fk": "55"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48dd"),
  "profile_id_fk": "1",
  "transition_id_fk": "56"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48de"),
  "profile_id_fk": "4",
  "transition_id_fk": "55"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48df"),
  "profile_id_fk": "4",
  "transition_id_fk": "56"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48e0"),
  "profile_id_fk": "6",
  "transition_id_fk": "35"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48e1"),
  "profile_id_fk": "6",
  "transition_id_fk": "39"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48e2"),
  "profile_id_fk": "6",
  "transition_id_fk": "40"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48e3"),
  "profile_id_fk": "6",
  "transition_id_fk": "44"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48e4"),
  "profile_id_fk": "6",
  "transition_id_fk": "45"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48e5"),
  "profile_id_fk": "6",
  "transition_id_fk": "46"
});
db.getCollection("framework_workflows_transitions_profiles").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48e6"),
  "profile_id_fk": "6",
  "transition_id_fk": "48"
});

/** framework_workflows_translations records **/
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48e7"),
  "workflow_id_fk": "1",
  "workflow_translation_language": "br",
  "workflow_translation_value": "Usu"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48e8"),
  "workflow_id_fk": "1",
  "workflow_translation_language": "de",
  "workflow_translation_value": "Benutzer"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48e9"),
  "workflow_id_fk": "1",
  "workflow_translation_language": "en",
  "workflow_translation_value": "Users"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ea"),
  "workflow_id_fk": "1",
  "workflow_translation_language": "es",
  "workflow_translation_value": "Usuarios"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48eb"),
  "workflow_id_fk": "1",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Utilisateurs"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ec"),
  "workflow_id_fk": "5",
  "workflow_translation_language": "br",
  "workflow_translation_value": "Projetos"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ed"),
  "workflow_id_fk": "5",
  "workflow_translation_language": "de",
  "workflow_translation_value": "Projekte"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ee"),
  "workflow_id_fk": "5",
  "workflow_translation_language": "en",
  "workflow_translation_value": "Projects"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ef"),
  "workflow_id_fk": "5",
  "workflow_translation_language": "es",
  "workflow_translation_value": "Proyectos"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48f0"),
  "workflow_id_fk": "5",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Projets"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48f1"),
  "workflow_id_fk": "6",
  "workflow_translation_language": "br",
  "workflow_translation_value": "Conex"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48f2"),
  "workflow_id_fk": "6",
  "workflow_translation_language": "de",
  "workflow_translation_value": "Externe Verbindungen"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48f3"),
  "workflow_id_fk": "6",
  "workflow_translation_language": "en",
  "workflow_translation_value": "External connections"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48f4"),
  "workflow_id_fk": "6",
  "workflow_translation_language": "es",
  "workflow_translation_value": "Conexiones externas"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48f5"),
  "workflow_id_fk": "6",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Connexions externes"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48f6"),
  "workflow_id_fk": "7",
  "workflow_translation_language": "br",
  "workflow_translation_value": "Template de colunas"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48f7"),
  "workflow_id_fk": "7",
  "workflow_translation_language": "de",
  "workflow_translation_value": "Spaltenvorlage"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48f8"),
  "workflow_id_fk": "7",
  "workflow_translation_language": "en",
  "workflow_translation_value": "Columns template"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48f9"),
  "workflow_id_fk": "7",
  "workflow_translation_language": "es",
  "workflow_translation_value": "Modelo de columnas"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48fa"),
  "workflow_id_fk": "7",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Mod"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48fb"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "br",
  "workflow_translation_value": "Global tags"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48fc"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "de",
  "workflow_translation_value": "Globale Tags"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48fd"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "en",
  "workflow_translation_value": "Global tags"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48fe"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "es",
  "workflow_translation_value": "Tags Globales"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ff"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Tags globaux"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48e7"),
  "workflow_id_fk": "1",
  "workflow_translation_language": "br",
  "workflow_translation_value": "Usu"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48e8"),
  "workflow_id_fk": "1",
  "workflow_translation_language": "de",
  "workflow_translation_value": "Benutzer"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48e9"),
  "workflow_id_fk": "1",
  "workflow_translation_language": "en",
  "workflow_translation_value": "Users"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ea"),
  "workflow_id_fk": "1",
  "workflow_translation_language": "es",
  "workflow_translation_value": "Usuarios"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48eb"),
  "workflow_id_fk": "1",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Utilisateurs"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ec"),
  "workflow_id_fk": "5",
  "workflow_translation_language": "br",
  "workflow_translation_value": "Projetos"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ed"),
  "workflow_id_fk": "5",
  "workflow_translation_language": "de",
  "workflow_translation_value": "Projekte"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ee"),
  "workflow_id_fk": "5",
  "workflow_translation_language": "en",
  "workflow_translation_value": "Projects"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ef"),
  "workflow_id_fk": "5",
  "workflow_translation_language": "es",
  "workflow_translation_value": "Proyectos"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48f0"),
  "workflow_id_fk": "5",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Projets"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48f1"),
  "workflow_id_fk": "6",
  "workflow_translation_language": "br",
  "workflow_translation_value": "Conex"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48f2"),
  "workflow_id_fk": "6",
  "workflow_translation_language": "de",
  "workflow_translation_value": "Externe Verbindungen"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48f3"),
  "workflow_id_fk": "6",
  "workflow_translation_language": "en",
  "workflow_translation_value": "External connections"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48f4"),
  "workflow_id_fk": "6",
  "workflow_translation_language": "es",
  "workflow_translation_value": "Conexiones externas"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48f5"),
  "workflow_id_fk": "6",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Connexions externes"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48f6"),
  "workflow_id_fk": "7",
  "workflow_translation_language": "br",
  "workflow_translation_value": "Template de colunas"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48f7"),
  "workflow_id_fk": "7",
  "workflow_translation_language": "de",
  "workflow_translation_value": "Spaltenvorlage"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48f8"),
  "workflow_id_fk": "7",
  "workflow_translation_language": "en",
  "workflow_translation_value": "Columns template"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48f9"),
  "workflow_id_fk": "7",
  "workflow_translation_language": "es",
  "workflow_translation_value": "Modelo de columnas"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48fa"),
  "workflow_id_fk": "7",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Mod"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48fb"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "br",
  "workflow_translation_value": "Global tags"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48fc"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "de",
  "workflow_translation_value": "Globale Tags"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48fd"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "en",
  "workflow_translation_value": "Global tags"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48fe"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "es",
  "workflow_translation_value": "Tags Globales"
});
db.getCollection("framework_workflows_translations").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ff"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Tags globaux"
});

/** kados_actions records **/
db.getCollection("kados_actions").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ff"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Tags globaux",
  "action_id": "",
  "text": "",
  "color": ""
});
db.getCollection("kados_actions").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ff"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Tags globaux",
  "action_id": "",
  "text": "",
  "color": ""
});

/** kados_activities records **/
db.getCollection("kados_activities").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ff"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Tags globaux",
  "action_id": "",
  "text": "",
  "color": "",
  "activity_id": ""
});
db.getCollection("kados_activities").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ff"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Tags globaux",
  "action_id": "",
  "text": "",
  "color": "",
  "activity_id": ""
});

/** kados_baselines records **/
db.getCollection("kados_baselines").insert({
  "_id": ObjectId("5463b245f05ef7e0188b48ff"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Tags globaux",
  "action_id": "",
  "text": "",
  "color": "",
  "activity_id": "",
  "baseline_date": "",
  "us_id_fk": "",
  "us_release_id_fk": ""
});
db.getCollection("kados_baselines").insert({
  "_id": ObjectId("5478e92df05ef7f6048b48ff"),
  "workflow_id_fk": "8",
  "workflow_translation_language": "fr",
  "workflow_translation_value": "Tags globaux",
  "action_id": "",
  "text": "",
  "color": "",
  "activity_id": "",
  "baseline_date": "",
  "us_id_fk": "",
  "us_release_id_fk": ""
});

/** kados_colors records **/
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4900"),
  "color_id": "1",
  "color_name": "beige",
  "color_value": "E1D1BA",
  "color_border_value": "A28F74"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4901"),
  "color_id": "2",
  "color_name": "blue",
  "color_value": "A6E3FC",
  "color_border_value": "265E74"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4902"),
  "color_id": "3",
  "color_name": "green",
  "color_value": "A5F88B",
  "color_border_value": "30822A"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4903"),
  "color_id": "4",
  "color_name": "orange",
  "color_value": "F79D35",
  "color_border_value": "CA802C"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4904"),
  "color_id": "5",
  "color_name": "pink",
  "color_value": "FFBEEC",
  "color_border_value": "BE0082"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4905"),
  "color_id": "6",
  "color_name": "white",
  "color_value": "FFFEF9",
  "color_border_value": "C4C3BF"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4906"),
  "color_id": "7",
  "color_name": "yellow",
  "color_value": "FDFB8C",
  "color_border_value": "BBA200"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4907"),
  "color_id": "15",
  "color_name": "purple",
  "color_value": "e352e3",
  "color_border_value": "520b52"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4908"),
  "color_id": "16",
  "color_name": "rouge",
  "color_value": "ff0d0d",
  "color_border_value": "b00a0a"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4909"),
  "color_id": "17",
  "color_name": "navy",
  "color_value": "b6bdfa",
  "color_border_value": "1e2d94"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b490a"),
  "color_id": "18",
  "color_name": "gris",
  "color_value": "e8e8e8",
  "color_border_value": "242424"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b490b"),
  "color_id": "19",
  "color_name": "brown",
  "color_value": "debc78",
  "color_border_value": "704802"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4900"),
  "color_id": "1",
  "color_name": "beige",
  "color_value": "E1D1BA",
  "color_border_value": "A28F74"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4901"),
  "color_id": "2",
  "color_name": "blue",
  "color_value": "A6E3FC",
  "color_border_value": "265E74"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4902"),
  "color_id": "3",
  "color_name": "green",
  "color_value": "A5F88B",
  "color_border_value": "30822A"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4903"),
  "color_id": "4",
  "color_name": "orange",
  "color_value": "F79D35",
  "color_border_value": "CA802C"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4904"),
  "color_id": "5",
  "color_name": "pink",
  "color_value": "FFBEEC",
  "color_border_value": "BE0082"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4905"),
  "color_id": "6",
  "color_name": "white",
  "color_value": "FFFEF9",
  "color_border_value": "C4C3BF"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4906"),
  "color_id": "7",
  "color_name": "yellow",
  "color_value": "FDFB8C",
  "color_border_value": "BBA200"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4907"),
  "color_id": "15",
  "color_name": "purple",
  "color_value": "e352e3",
  "color_border_value": "520b52"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4908"),
  "color_id": "16",
  "color_name": "rouge",
  "color_value": "ff0d0d",
  "color_border_value": "b00a0a"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4909"),
  "color_id": "17",
  "color_name": "navy",
  "color_value": "b6bdfa",
  "color_border_value": "1e2d94"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b490a"),
  "color_id": "18",
  "color_name": "gris",
  "color_value": "e8e8e8",
  "color_border_value": "242424"
});
db.getCollection("kados_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b490b"),
  "color_id": "19",
  "color_name": "brown",
  "color_value": "debc78",
  "color_border_value": "704802"
});

/** kados_colors_uses records **/
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b490c"),
  "use_color_id": "1",
  "use_color_postit_type": "US",
  "use_color_meaning": "US",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "beige",
  "active": "1",
  "xpos": "10",
  "ypos": "300",
  "zpos": "13"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b490d"),
  "use_color_id": "2",
  "use_color_postit_type": "US",
  "use_color_meaning": "Note",
  "use_color_default": "0",
  "use_color_lock": "1",
  "color": "white",
  "active": "1",
  "xpos": "10",
  "ypos": "215",
  "zpos": "12"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b490e"),
  "use_color_id": "3",
  "use_color_postit_type": "TASK",
  "use_color_meaning": "Test",
  "use_color_default": "0",
  "use_color_lock": "1",
  "color": "green",
  "active": "1",
  "xpos": "10",
  "ypos": "215",
  "zpos": "8"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b490f"),
  "use_color_id": "4",
  "use_color_postit_type": "TASK",
  "use_color_meaning": "Dev",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "yellow",
  "active": "1",
  "xpos": "10",
  "ypos": "130",
  "zpos": "7"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4910"),
  "use_color_id": "5",
  "use_color_postit_type": "TASK",
  "use_color_meaning": "Infrastructure",
  "use_color_default": "0",
  "use_color_lock": "1",
  "color": "purple",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "6"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4911"),
  "use_color_id": "6",
  "use_color_postit_type": "RISK",
  "use_color_meaning": "Risque",
  "use_color_default": "0",
  "use_color_lock": "1",
  "color": "orange",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "4"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4912"),
  "use_color_id": "7",
  "use_color_postit_type": "PROBLEM",
  "use_color_meaning": "",
  "use_color_default": "0",
  "use_color_lock": "1",
  "color": "rouge",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "3"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4913"),
  "use_color_id": "8",
  "use_color_postit_type": "ACTIVITY",
  "use_color_meaning": "Activity",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "navy",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "2"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4914"),
  "use_color_id": "9",
  "use_color_postit_type": "STKH",
  "use_color_meaning": "",
  "use_color_default": "0",
  "use_color_lock": "1",
  "color": "brown",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "5"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4915"),
  "use_color_id": "10",
  "use_color_postit_type": "US",
  "use_color_meaning": "",
  "use_color_default": "0",
  "use_color_lock": "0",
  "color": "pink",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "10"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4916"),
  "use_color_id": "11",
  "use_color_postit_type": "US",
  "use_color_meaning": "",
  "use_color_default": "0",
  "use_color_lock": "0",
  "color": "orange",
  "active": "1",
  "xpos": "10",
  "ypos": "130",
  "zpos": "11"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4917"),
  "use_color_id": "12",
  "use_color_postit_type": "TASK",
  "use_color_meaning": null,
  "use_color_default": "0",
  "use_color_lock": "0",
  "color": "brown",
  "active": "1",
  "xpos": "10",
  "ypos": "300",
  "zpos": "9"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4918"),
  "use_color_id": "13",
  "use_color_postit_type": "ACTION",
  "use_color_meaning": "Action",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "gris",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "1"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b490c"),
  "use_color_id": "1",
  "use_color_postit_type": "US",
  "use_color_meaning": "US",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "beige",
  "active": "1",
  "xpos": "10",
  "ypos": "300",
  "zpos": "13"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b490d"),
  "use_color_id": "2",
  "use_color_postit_type": "US",
  "use_color_meaning": "Note",
  "use_color_default": "0",
  "use_color_lock": "1",
  "color": "white",
  "active": "1",
  "xpos": "10",
  "ypos": "215",
  "zpos": "12"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b490e"),
  "use_color_id": "3",
  "use_color_postit_type": "TASK",
  "use_color_meaning": "Test",
  "use_color_default": "0",
  "use_color_lock": "1",
  "color": "green",
  "active": "1",
  "xpos": "10",
  "ypos": "215",
  "zpos": "8"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b490f"),
  "use_color_id": "4",
  "use_color_postit_type": "TASK",
  "use_color_meaning": "Dev",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "yellow",
  "active": "1",
  "xpos": "10",
  "ypos": "130",
  "zpos": "7"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4910"),
  "use_color_id": "5",
  "use_color_postit_type": "TASK",
  "use_color_meaning": "Infrastructure",
  "use_color_default": "0",
  "use_color_lock": "1",
  "color": "purple",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "6"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4911"),
  "use_color_id": "6",
  "use_color_postit_type": "RISK",
  "use_color_meaning": "Risque",
  "use_color_default": "0",
  "use_color_lock": "1",
  "color": "orange",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "4"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4912"),
  "use_color_id": "7",
  "use_color_postit_type": "PROBLEM",
  "use_color_meaning": "",
  "use_color_default": "0",
  "use_color_lock": "1",
  "color": "rouge",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "3"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4913"),
  "use_color_id": "8",
  "use_color_postit_type": "ACTIVITY",
  "use_color_meaning": "Activity",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "navy",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "2"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4914"),
  "use_color_id": "9",
  "use_color_postit_type": "STKH",
  "use_color_meaning": "",
  "use_color_default": "0",
  "use_color_lock": "1",
  "color": "brown",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "5"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4915"),
  "use_color_id": "10",
  "use_color_postit_type": "US",
  "use_color_meaning": "",
  "use_color_default": "0",
  "use_color_lock": "0",
  "color": "pink",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "10"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4916"),
  "use_color_id": "11",
  "use_color_postit_type": "US",
  "use_color_meaning": "",
  "use_color_default": "0",
  "use_color_lock": "0",
  "color": "orange",
  "active": "1",
  "xpos": "10",
  "ypos": "130",
  "zpos": "11"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4917"),
  "use_color_id": "12",
  "use_color_postit_type": "TASK",
  "use_color_meaning": null,
  "use_color_default": "0",
  "use_color_lock": "0",
  "color": "brown",
  "active": "1",
  "xpos": "10",
  "ypos": "300",
  "zpos": "9"
});
db.getCollection("kados_colors_uses").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4918"),
  "use_color_id": "13",
  "use_color_postit_type": "ACTION",
  "use_color_meaning": "Action",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "gris",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "1"
});

/** kados_connections records **/
db.getCollection("kados_connections").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4918"),
  "use_color_id": "13",
  "use_color_postit_type": "ACTION",
  "use_color_meaning": "Action",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "gris",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "1",
  "connection_id": "",
  "connection_name": "",
  "connection_status_id_fk": "",
  "connection_db_type": "",
  "connection_host": "",
  "connection_port": "",
  "connection_dbname": "",
  "connection_user": "",
  "connection_password": "",
  "connection_table_projects": ""
});
db.getCollection("kados_connections").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4918"),
  "use_color_id": "13",
  "use_color_postit_type": "ACTION",
  "use_color_meaning": "Action",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "gris",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "1",
  "connection_id": "",
  "connection_name": "",
  "connection_status_id_fk": "",
  "connection_db_type": "",
  "connection_host": "",
  "connection_port": "",
  "connection_dbname": "",
  "connection_user": "",
  "connection_password": "",
  "connection_table_projects": ""
});

/** kados_features records **/
db.getCollection("kados_features").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4918"),
  "use_color_id": "13",
  "use_color_postit_type": "ACTION",
  "use_color_meaning": "Action",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "gris",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "1",
  "connection_id": "",
  "connection_name": "",
  "connection_status_id_fk": "",
  "connection_db_type": "",
  "connection_host": "",
  "connection_port": "",
  "connection_dbname": "",
  "connection_user": "",
  "connection_password": "",
  "connection_table_projects": "",
  "feature_id": "",
  "feature_short_label": "",
  "feature_name": "",
  "feature_description": "",
  "feature_project_id_fk": ""
});
db.getCollection("kados_features").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4918"),
  "use_color_id": "13",
  "use_color_postit_type": "ACTION",
  "use_color_meaning": "Action",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "gris",
  "active": "1",
  "xpos": "10",
  "ypos": "45",
  "zpos": "1",
  "connection_id": "",
  "connection_name": "",
  "connection_status_id_fk": "",
  "connection_db_type": "",
  "connection_host": "",
  "connection_port": "",
  "connection_dbname": "",
  "connection_user": "",
  "connection_password": "",
  "connection_table_projects": "",
  "feature_id": "",
  "feature_short_label": "",
  "feature_name": "",
  "feature_description": "",
  "feature_project_id_fk": ""
});

/** kados_issues records **/
db.getCollection("kados_issues").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4918"),
  "use_color_id": "13",
  "use_color_postit_type": "ACTION",
  "use_color_meaning": "Action",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "",
  "active": "",
  "xpos": "",
  "ypos": "",
  "zpos": "1",
  "connection_id": "",
  "connection_name": "",
  "connection_status_id_fk": "",
  "connection_db_type": "",
  "connection_host": "",
  "connection_port": "",
  "connection_dbname": "",
  "connection_user": "",
  "connection_password": "",
  "connection_table_projects": "",
  "feature_id": "",
  "feature_short_label": "",
  "feature_name": "",
  "feature_description": "",
  "feature_project_id_fk": "",
  "issue_id": "",
  "text": "",
  "probability": "",
  "impact": "",
  "issue_type": "",
  "status": ""
});
db.getCollection("kados_issues").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4918"),
  "use_color_id": "13",
  "use_color_postit_type": "ACTION",
  "use_color_meaning": "Action",
  "use_color_default": "1",
  "use_color_lock": "1",
  "color": "",
  "active": "",
  "xpos": "",
  "ypos": "",
  "zpos": "1",
  "connection_id": "",
  "connection_name": "",
  "connection_status_id_fk": "",
  "connection_db_type": "",
  "connection_host": "",
  "connection_port": "",
  "connection_dbname": "",
  "connection_user": "",
  "connection_password": "",
  "connection_table_projects": "",
  "feature_id": "",
  "feature_short_label": "",
  "feature_name": "",
  "feature_description": "",
  "feature_project_id_fk": "",
  "issue_id": "",
  "text": "",
  "probability": "",
  "impact": "",
  "issue_type": "",
  "status": ""
});

/** kados_projects records **/
db.getCollection("kados_projects").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4919"),
  "project_id": "1",
  "project_name": "Demo Project",
  "project_creator": "admin",
  "project_creation_date": "2014-04-24",
  "project_status_id_fk": "5",
  "project_external_project_id": "0",
  "project_external_project_connection_id": "0",
  "project_sprint_overlapping": "0",
  "project_levels": "3",
  "project_visibility": "PUB",
  "project_use_tags": "0",
  "project_block_raf": "0"
});
db.getCollection("kados_projects").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4919"),
  "project_id": "1",
  "project_name": "Demo Project",
  "project_creator": "admin",
  "project_creation_date": "2014-04-24",
  "project_status_id_fk": "5",
  "project_external_project_id": "0",
  "project_external_project_connection_id": "0",
  "project_sprint_overlapping": "0",
  "project_levels": "3",
  "project_visibility": "PUB",
  "project_use_tags": "0",
  "project_block_raf": "0"
});

/** kados_projects_colors records **/
db.getCollection("kados_projects_colors").insert({
  "_id": ObjectId("5463b245f05ef7e0188b4919"),
  "project_id": "1",
  "project_name": "Demo Project",
  "project_creator": "admin",
  "project_creation_date": "2014-04-24",
  "project_status_id_fk": "5",
  "project_external_project_id": "0",
  "project_external_project_connection_id": "0",
  "project_sprint_overlapping": "0",
  "project_levels": "3",
  "project_visibility": "PUB",
  "project_use_tags": "0",
  "project_block_raf": "0",
  "project_id_fk": "",
  "color_id_fk": "",
  "object_type": "",
  "object_color_meaning": "",
  "object_color_default": ""
});
db.getCollection("kados_projects_colors").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4919"),
  "project_id": "1",
  "project_name": "Demo Project",
  "project_creator": "admin",
  "project_creation_date": "2014-04-24",
  "project_status_id_fk": "5",
  "project_external_project_id": "0",
  "project_external_project_connection_id": "0",
  "project_sprint_overlapping": "0",
  "project_levels": "3",
  "project_visibility": "PUB",
  "project_use_tags": "0",
  "project_block_raf": "0",
  "project_id_fk": "",
  "color_id_fk": "",
  "object_type": "",
  "object_color_meaning": "",
  "object_color_default": ""
});

/** kados_projects_columns records **/
db.getCollection("kados_projects_columns").insert({
  "_id": ObjectId("5463b247f05ef7e0188b491a"),
  "project_id_fk": "1",
  "column_tag_fk": "DONE",
  "column_order": "3",
  "column_meaning": ""
});
db.getCollection("kados_projects_columns").insert({
  "_id": ObjectId("5463b247f05ef7e0188b491b"),
  "project_id_fk": "1",
  "column_tag_fk": "PROG",
  "column_order": "2",
  "column_meaning": ""
});
db.getCollection("kados_projects_columns").insert({
  "_id": ObjectId("5463b247f05ef7e0188b491c"),
  "project_id_fk": "1",
  "column_tag_fk": "TODO",
  "column_order": "1",
  "column_meaning": ""
});
db.getCollection("kados_projects_columns").insert({
  "_id": ObjectId("5478e92df05ef7f6048b491a"),
  "project_id_fk": "1",
  "column_tag_fk": "DONE",
  "column_order": "3",
  "column_meaning": ""
});
db.getCollection("kados_projects_columns").insert({
  "_id": ObjectId("5478e92df05ef7f6048b491b"),
  "project_id_fk": "1",
  "column_tag_fk": "PROG",
  "column_order": "2",
  "column_meaning": ""
});
db.getCollection("kados_projects_columns").insert({
  "_id": ObjectId("5478e92df05ef7f6048b491c"),
  "project_id_fk": "1",
  "column_tag_fk": "TODO",
  "column_order": "1",
  "column_meaning": ""
});

/** kados_projects_idle_days records **/
db.getCollection("kados_projects_idle_days").insert({
  "_id": ObjectId("5463b247f05ef7e0188b491c"),
  "project_id_fk": "",
  "column_tag_fk": "TODO",
  "column_order": "1",
  "column_meaning": "",
  "idle_day": ""
});
db.getCollection("kados_projects_idle_days").insert({
  "_id": ObjectId("5478e92df05ef7f6048b491c"),
  "project_id_fk": "",
  "column_tag_fk": "TODO",
  "column_order": "1",
  "column_meaning": "",
  "idle_day": ""
});

/** kados_projects_settings records **/
db.getCollection("kados_projects_settings").insert({
  "_id": ObjectId("5463b247f05ef7e0188b491d"),
  "setting_tag": "PP_VAL",
  "project_id_fk": "1",
  "setting_value": "0;1;2;3;5;8;13;20;30;50;80;100"
});
db.getCollection("kados_projects_settings").insert({
  "_id": ObjectId("5463b247f05ef7e0188b491e"),
  "setting_tag": "US_BVL",
  "project_id_fk": "1",
  "setting_value": "0;100;200;300;500;800;1000;2000"
});
db.getCollection("kados_projects_settings").insert({
  "_id": ObjectId("5463b247f05ef7e0188b491f"),
  "setting_tag": "WK_DAY",
  "project_id_fk": "1",
  "setting_value": "0;1;2;3;4"
});
db.getCollection("kados_projects_settings").insert({
  "_id": ObjectId("5478e92df05ef7f6048b491d"),
  "setting_tag": "PP_VAL",
  "project_id_fk": "1",
  "setting_value": "0;1;2;3;5;8;13;20;30;50;80;100"
});
db.getCollection("kados_projects_settings").insert({
  "_id": ObjectId("5478e92df05ef7f6048b491e"),
  "setting_tag": "US_BVL",
  "project_id_fk": "1",
  "setting_value": "0;100;200;300;500;800;1000;2000"
});
db.getCollection("kados_projects_settings").insert({
  "_id": ObjectId("5478e92df05ef7f6048b491f"),
  "setting_tag": "WK_DAY",
  "project_id_fk": "1",
  "setting_value": "0;1;2;3;4"
});

/** kados_projects_users records **/
db.getCollection("kados_projects_users").insert({
  "_id": ObjectId("5463b247f05ef7e0188b4920"),
  "stakeholder_id": "1",
  "project_id_fk": "1",
  "user_login_fk": "admin",
  "profile_id_fk": "4",
  "xpos": "55",
  "ypos": "37",
  "zpos": "2",
  "color": "brown",
  "active": "1",
  "release_id_fk": "0"
});
db.getCollection("kados_projects_users").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4920"),
  "stakeholder_id": "1",
  "project_id_fk": "1",
  "user_login_fk": "admin",
  "profile_id_fk": "4",
  "xpos": "55",
  "ypos": "37",
  "zpos": "2",
  "color": "brown",
  "active": "1",
  "release_id_fk": "0"
});

/** kados_releases records **/
db.getCollection("kados_releases").insert({
  "_id": ObjectId("5463b247f05ef7e0188b4921"),
  "release_id": "1",
  "release_name": "v1.0.0",
  "release_creation_date": "2014-04-24",
  "release_due_date": "2014-12-16",
  "release_project_id_fk": "1",
  "release_external_release_id": "0",
  "release_external_release_connection_id": "0",
  "visibility": "1",
  "release_template_activities_id_fk": "0"
});
db.getCollection("kados_releases").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4921"),
  "release_id": "1",
  "release_name": "v1.0.0",
  "release_creation_date": "2014-04-24",
  "release_due_date": "2014-12-16",
  "release_project_id_fk": "1",
  "release_external_release_id": "0",
  "release_external_release_connection_id": "0",
  "visibility": "1",
  "release_template_activities_id_fk": "0"
});

/** kados_sprints records **/
db.getCollection("kados_sprints").insert({
  "_id": ObjectId("5463b247f05ef7e0188b4922"),
  "sprint_id": "1",
  "sprint_name": "Sprint 1",
  "sprint_number": "1",
  "sprint_start_date": "2014-04-30",
  "sprint_end_date": "2014-05-16",
  "sprint_release_id_fk": "1",
  "visibility": "1"
});
db.getCollection("kados_sprints").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4922"),
  "sprint_id": "1",
  "sprint_name": "Sprint 1",
  "sprint_number": "1",
  "sprint_start_date": "2014-04-30",
  "sprint_end_date": "2014-05-16",
  "sprint_release_id_fk": "1",
  "visibility": "1"
});

/** kados_sprints_progress records **/
db.getCollection("kados_sprints_progress").insert({
  "_id": ObjectId("5463b248f05ef7e0188b4923"),
  "log_sprint_id_fk": "1",
  "log_date": "2014-04-30",
  "log_task_count": "1",
  "log_us_count": "1",
  "log_initial_forecast": "0.0",
  "log_spent": "0.0",
  "log_new_forecast": "0.0"
});
db.getCollection("kados_sprints_progress").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4923"),
  "log_sprint_id_fk": "1",
  "log_date": "2014-04-30",
  "log_task_count": "1",
  "log_us_count": "1",
  "log_initial_forecast": "0.0",
  "log_spent": "0.0",
  "log_new_forecast": "0.0"
});

/** kados_tags records **/
db.getCollection("kados_tags").insert({
  "_id": ObjectId("5463b248f05ef7e0188b4924"),
  "tag_id": "1",
  "tag_label": "Nouveau",
  "tag_owner": "admin",
  "tag_color": "rouge",
  "tag_type": "ALL_MAND",
  "tag_status_id_fk": "20"
});
db.getCollection("kados_tags").insert({
  "_id": ObjectId("5463b248f05ef7e0188b4925"),
  "tag_id": "2",
  "tag_label": "Important",
  "tag_owner": "admin",
  "tag_color": "navy",
  "tag_type": "ALL_FREE",
  "tag_status_id_fk": "20"
});
db.getCollection("kados_tags").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4924"),
  "tag_id": "1",
  "tag_label": "Nouveau",
  "tag_owner": "admin",
  "tag_color": "rouge",
  "tag_type": "ALL_MAND",
  "tag_status_id_fk": "20"
});
db.getCollection("kados_tags").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4925"),
  "tag_id": "2",
  "tag_label": "Important",
  "tag_owner": "admin",
  "tag_color": "navy",
  "tag_type": "ALL_FREE",
  "tag_status_id_fk": "20"
});

/** kados_tags_postit records **/
db.getCollection("kados_tags_postit").insert({
  "_id": ObjectId("5463b248f05ef7e0188b4925"),
  "tag_id": "2",
  "tag_label": "Important",
  "tag_owner": "admin",
  "tag_color": "navy",
  "tag_type": "ALL_FREE",
  "tag_status_id_fk": "20",
  "tag_id_fk": "",
  "postit_id_fk": "",
  "postit_type": "",
  "tagged_date": "",
  "tagged_by": ""
});
db.getCollection("kados_tags_postit").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4925"),
  "tag_id": "2",
  "tag_label": "Important",
  "tag_owner": "admin",
  "tag_color": "navy",
  "tag_type": "ALL_FREE",
  "tag_status_id_fk": "20",
  "tag_id_fk": "",
  "postit_id_fk": "",
  "postit_type": "",
  "tagged_date": "",
  "tagged_by": ""
});

/** kados_tags_projects records **/
db.getCollection("kados_tags_projects").insert({
  "_id": ObjectId("5463b248f05ef7e0188b4925"),
  "tag_id": "2",
  "tag_label": "Important",
  "tag_owner": "admin",
  "tag_color": "navy",
  "tag_type": "ALL_FREE",
  "tag_status_id_fk": "20",
  "tag_id_fk": "",
  "postit_id_fk": "",
  "postit_type": "",
  "tagged_date": "",
  "tagged_by": "",
  "project_id_fk": ""
});
db.getCollection("kados_tags_projects").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4925"),
  "tag_id": "2",
  "tag_label": "Important",
  "tag_owner": "admin",
  "tag_color": "navy",
  "tag_type": "ALL_FREE",
  "tag_status_id_fk": "20",
  "tag_id_fk": "",
  "postit_id_fk": "",
  "postit_type": "",
  "tagged_date": "",
  "tagged_by": "",
  "project_id_fk": ""
});

/** kados_tasks records **/
db.getCollection("kados_tasks").insert({
  "_id": ObjectId("5463b24af05ef7e0188b4926"),
  "task_id": "1",
  "text": "Task 1",
  "color": "yellow",
  "status": "PROG",
  "active": "1",
  "xpos": "25",
  "ypos": "54",
  "zpos": "2",
  "us_id_fk": "1",
  "task_creator": "admin",
  "task_creation_date": "2014-04-24 11:45:46",
  "task_last_updater": "admin",
  "task_last_update_date": "2014-04-24 11:45:51",
  "task_init_load": "0.0",
  "task_load": "0.0",
  "task_done": "0.0",
  "task_raf": "0.0",
  "task_finished": "0",
  "task_date_finished": "0000-00-00",
  "task_link": "",
  "task_leader": "admin",
  "task_number": "1",
  "task_us_number": "1",
  "xpos_l": "10",
  "ypos_l": "40",
  "zpos_l": "0"
});
db.getCollection("kados_tasks").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4926"),
  "task_id": "1",
  "text": "Task 1",
  "color": "yellow",
  "status": "PROG",
  "active": "1",
  "xpos": "25",
  "ypos": "54",
  "zpos": "2",
  "us_id_fk": "1",
  "task_creator": "admin",
  "task_creation_date": "2014-04-24 11:45:46",
  "task_last_updater": "admin",
  "task_last_update_date": "2014-04-24 11:45:51",
  "task_init_load": "0.0",
  "task_load": "0.0",
  "task_done": "0.0",
  "task_raf": "0.0",
  "task_finished": "0",
  "task_date_finished": "0000-00-00",
  "task_link": "",
  "task_leader": "admin",
  "task_number": "1",
  "task_us_number": "1",
  "xpos_l": "10",
  "ypos_l": "40",
  "zpos_l": "0"
});

/** kados_template_activities records **/
db.getCollection("kados_template_activities").insert({
  "_id": ObjectId("5463b24af05ef7e0188b4926"),
  "task_id": "1",
  "text": "",
  "color": "",
  "status": "",
  "active": "",
  "xpos": "",
  "ypos": "",
  "zpos": "",
  "us_id_fk": "1",
  "task_creator": "admin",
  "task_creation_date": "2014-04-24 11:45:46",
  "task_last_updater": "admin",
  "task_last_update_date": "2014-04-24 11:45:51",
  "task_init_load": "0.0",
  "task_load": "0.0",
  "task_done": "0.0",
  "task_raf": "0.0",
  "task_finished": "0",
  "task_date_finished": "0000-00-00",
  "task_link": "",
  "task_leader": "admin",
  "task_number": "1",
  "task_us_number": "1",
  "xpos_l": "10",
  "ypos_l": "40",
  "zpos_l": "0",
  "template_activity_id": ""
});
db.getCollection("kados_template_activities").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4926"),
  "task_id": "1",
  "text": "",
  "color": "",
  "status": "",
  "active": "",
  "xpos": "",
  "ypos": "",
  "zpos": "",
  "us_id_fk": "1",
  "task_creator": "admin",
  "task_creation_date": "2014-04-24 11:45:46",
  "task_last_updater": "admin",
  "task_last_update_date": "2014-04-24 11:45:51",
  "task_init_load": "0.0",
  "task_load": "0.0",
  "task_done": "0.0",
  "task_raf": "0.0",
  "task_finished": "0",
  "task_date_finished": "0000-00-00",
  "task_link": "",
  "task_leader": "admin",
  "task_number": "1",
  "task_us_number": "1",
  "xpos_l": "10",
  "ypos_l": "40",
  "zpos_l": "0",
  "template_activity_id": ""
});

/** kados_template_columns records **/
db.getCollection("kados_template_columns").insert({
  "_id": ObjectId("5463b24af05ef7e0188b4927"),
  "column_tag": "DEVOK",
  "column_name": "Dev OK",
  "column_usage": "Source code and unit tests are OK",
  "column_status_id_fk": "19"
});
db.getCollection("kados_template_columns").insert({
  "_id": ObjectId("5463b24af05ef7e0188b4928"),
  "column_tag": "DONE",
  "column_name": "Done",
  "column_usage": "Task is done",
  "column_status_id_fk": "19"
});
db.getCollection("kados_template_columns").insert({
  "_id": ObjectId("5463b24af05ef7e0188b4929"),
  "column_tag": "PROG",
  "column_name": "In Progress",
  "column_usage": "Item is under progress",
  "column_status_id_fk": "19"
});
db.getCollection("kados_template_columns").insert({
  "_id": ObjectId("5463b24af05ef7e0188b492a"),
  "column_tag": "TODO",
  "column_name": "To Do",
  "column_usage": "First column and default column",
  "column_status_id_fk": "19"
});
db.getCollection("kados_template_columns").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4927"),
  "column_tag": "DEVOK",
  "column_name": "Dev OK",
  "column_usage": "Source code and unit tests are OK",
  "column_status_id_fk": "19"
});
db.getCollection("kados_template_columns").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4928"),
  "column_tag": "DONE",
  "column_name": "Done",
  "column_usage": "Task is done",
  "column_status_id_fk": "19"
});
db.getCollection("kados_template_columns").insert({
  "_id": ObjectId("5478e92df05ef7f6048b4929"),
  "column_tag": "PROG",
  "column_name": "In Progress",
  "column_usage": "Item is under progress",
  "column_status_id_fk": "19"
});
db.getCollection("kados_template_columns").insert({
  "_id": ObjectId("5478e92df05ef7f6048b492a"),
  "column_tag": "TODO",
  "column_name": "To Do",
  "column_usage": "First column and default column",
  "column_status_id_fk": "19"
});

/** kados_user_stories records **/
db.getCollection("kados_user_stories").insert({
  "_id": ObjectId("5463b24af05ef7e0188b492b"),
  "us_id": "1",
  "text": "As a ...., I want to ..... in order to....",
  "business_value": "500",
  "complexity": "0",
  "color": "beige",
  "status": "TODO",
  "active": "1",
  "xpos": "40",
  "ypos": "40",
  "zpos": "0",
  "us_project_id_fk": "1",
  "us_release_id_fk": "0",
  "xpos_r": "39",
  "ypos_r": "106",
  "zpos_r": "11",
  "us_sprint_id_fk": "0",
  "xpos_s": "10",
  "ypos_s": "54",
  "zpos_s": "2",
  "us_creator": "admin",
  "us_creation_date": "2014-04-24 11:45:36",
  "us_last_updater": "admin",
  "us_last_update_date": "2014-04-24 11:45:36",
  "xpos_c": "10",
  "ypos_c": "30",
  "zpos_c": "0",
  "xpos_bv": "19",
  "ypos_bv": "26",
  "zpos_bv": "1",
  "us_link": "",
  "us_number": "1",
  "xpos_pw": "40",
  "ypos_pw": "40",
  "zpos_pw": "0",
  "xpos_rw": "40",
  "ypos_rw": "40",
  "zpos_rw": "0",
  "xpos_feat": "10",
  "ypos_feat": "45",
  "zpos_feat": "1",
  "us_feature_id_fk": "0",
  "us_date_finished": null
});
db.getCollection("kados_user_stories").insert({
  "_id": ObjectId("5478e92df05ef7f6048b492b"),
  "us_id": "1",
  "text": "As a ...., I want to ..... in order to....",
  "business_value": "500",
  "complexity": "0",
  "color": "beige",
  "status": "TODO",
  "active": "1",
  "xpos": "40",
  "ypos": "40",
  "zpos": "0",
  "us_project_id_fk": "1",
  "us_release_id_fk": "0",
  "xpos_r": "39",
  "ypos_r": "106",
  "zpos_r": "11",
  "us_sprint_id_fk": "0",
  "xpos_s": "10",
  "ypos_s": "54",
  "zpos_s": "2",
  "us_creator": "admin",
  "us_creation_date": "2014-04-24 11:45:36",
  "us_last_updater": "admin",
  "us_last_update_date": "2014-04-24 11:45:36",
  "xpos_c": "10",
  "ypos_c": "30",
  "zpos_c": "0",
  "xpos_bv": "19",
  "ypos_bv": "26",
  "zpos_bv": "1",
  "us_link": "",
  "us_number": "1",
  "xpos_pw": "40",
  "ypos_pw": "40",
  "zpos_pw": "0",
  "xpos_rw": "40",
  "ypos_rw": "40",
  "zpos_rw": "0",
  "xpos_feat": "10",
  "ypos_feat": "45",
  "zpos_feat": "1",
  "us_feature_id_fk": "0",
  "us_date_finished": null
});

/** kados_users_bookmarks records **/
db.getCollection("kados_users_bookmarks").insert({
  "_id": ObjectId("5463b24af05ef7e0188b492c"),
  "user_login_fk": "admin",
  "project_id_fk": "1",
  "bookmark_order": "1",
  "bookmark_color": ""
});
db.getCollection("kados_users_bookmarks").insert({
  "_id": ObjectId("5478e92df05ef7f6048b492c"),
  "user_login_fk": "admin",
  "project_id_fk": "1",
  "bookmark_order": "1",
  "bookmark_color": ""
});

/** kados_users_decks records **/
db.getCollection("kados_users_decks").insert({
  "_id": ObjectId("5463b24af05ef7e0188b492c"),
  "user_login_fk": "",
  "project_id_fk": "1",
  "bookmark_order": "1",
  "bookmark_color": "",
  "item_id_fk": "",
  "item_type": ""
});
db.getCollection("kados_users_decks").insert({
  "_id": ObjectId("5478e92df05ef7f6048b492c"),
  "user_login_fk": "",
  "project_id_fk": "1",
  "bookmark_order": "1",
  "bookmark_color": "",
  "item_id_fk": "",
  "item_type": ""
});

/** system.indexes records **/
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_languages",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_menus",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_menus_translations",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_parameters",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_parameters_translations",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_profiles",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_profiles_actions",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_profiles_actions_translations",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_profiles_constitution_actions",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_status",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_status_translations",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_users",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_workflows",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_workflows_transitions",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_workflows_transitions_profiles",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_workflows_translations",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_actions",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_activities",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_baselines",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_colors",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_colors_uses",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_connections",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_features",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_issues",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_projects",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_projects_colors",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_projects_columns",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_projects_idle_days",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.framework_profiles_constitution_menus",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_projects_settings",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_projects_users",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_releases",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_sprints",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_sprints_progress",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_tags",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_tags_postit",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_tags_projects",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_tasks",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_template_activities",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_template_columns",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_user_stories",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_users_bookmarks",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "kados.kados_users_decks",
  "name": "_id_"
});
